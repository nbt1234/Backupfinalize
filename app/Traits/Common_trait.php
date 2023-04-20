<?php 

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait Common_trait{

	public function create_unique_slug($string='', $table='', $field = 'slug', $key = null, $value = null)
    {
        $slug = Str::of($string)->slug('-');
        $slug = strtolower($slug);

        $i = 0;
        $params = array();
        $params[$field] = $slug;
        if ($key) {
            $params["$key !="] = $value;
        }

        while (DB::table($table)->where($params)->count()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug)) {
                $slug .= '-' . ++$i;
            } else {
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
            }
            $params[$field] = $slug;
        }
        return $slug;
    }

    function get_combinations($arrays)
    {
        $result = array(array());
        foreach ($arrays as $property => $property_values) {
            $tmp = array();
            foreach ($result as $result_item) {
                foreach (explode(",", $property_values) as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }

}

?>