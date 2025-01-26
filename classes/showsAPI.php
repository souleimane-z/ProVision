<?php
require_once __DIR__ . '/../config/tmdb.php';
require_once __DIR__ . '/../config/api_config.php';

class ShowsAPI {
    private static $instance = null;
    private $cache;
    private $tmdbKey;
    private $baseUrl;
    private $imageUrl;

    private function __construct() {
        $this->cache = new Cache();
        $this->tmdbKey = TMDB_API_KEY;
        $this->baseUrl = TMDB_BASE_URL;
        $this->imageUrl = TMDB_IMAGE_BASE_URL;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function makeRequest($endpoint, $params = []) {
        $cacheKey = $endpoint . serialize($params);
        $cached = $this->cache->get($cacheKey);

        if ($cached !== null) {
            return $cached;
        }

        $params['api_key'] = $this->tmdbKey;
        $params['language'] = 'fr-FR';

        $url = $this->baseUrl . $endpoint . '?' . http_build_query($params);
        $ch = curl_init();
        curl_setopt_array($ch, getCurlOptions($url));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('Erreur cURL : ' . curl_error($ch));
        }

        curl_close($ch);
        $result = json_decode($response, true);
        $this->cache->set($cacheKey, $result);

        return $result;
    }

    // Récupérer les séries par genre
    public function getSeriesByGenre($genreId, $limit = 4) {
        $data = $this->makeRequest('/discover/tv', [
            'with_genres' => $genreId,
            'page' => 1
        ]);
        $series = array_slice($data['results'], 0, $limit);
        return array_map([$this, 'enrichSeriesData'], $series);
    }

    // Récupérer les séries tendances
    public function getTrendingSeries($limit = 20) {
        try {
            $data = $this->makeRequest('/trending/tv/week');
            if (!isset($data['results']) || empty($data['results'])) {
                throw new Exception('Aucun résultat trouvé dans getTrendingSeries');
            }
            $series = is_array($data['results']) ? $data['results'] : [];
            $series = array_slice($series, 0, $limit);
            return array_map([$this, 'enrichSeriesData'], $series);
        } catch (Exception $e) {
            error_log("Erreur dans getTrendingSeries: " . $e->getMessage());
            return [];
        }
    }

    // Enrichir les données des séries
    private function enrichSeriesData($series) {
        if (!isset($series['runtime'])) {
            $details = $this->getSeriesDetails($series['id']);
            $series['runtime'] = $details['episode_run_time'][0] ?? 0; // Durée d'un épisode
        }
        return $series;
    }

    // Récupérer les détails d'une série
    public function getSeriesDetails($seriesId) {
        $cacheKey = "series_$seriesId";
        $cached = $this->cache->get($cacheKey);

        if ($cached !== null) {
            return $cached;
        }

        $details = $this->makeRequest("/tv/$seriesId");
        $this->cache->set($cacheKey, $details);
        return $details;
    }
}
