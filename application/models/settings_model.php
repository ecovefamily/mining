<?php

class Settings_Model extends MY_Model {

    public $_table_name;
    public $_order_by;
    public $_primary_key;

    function translations() {

        $companies = $this->db->select('language')->group_by('language')->order_by('language', 'ASC')->get('tbl_client');
        $users = $this->db->select('language')->group_by('language')->order_by('language', 'ASC')->get('tbl_account_details');
        if ($companies && $companies->num_rows()>0) {
            $companies =  $companies->result();
			foreach ($companies as $lang) {
                $tran[$lang->language] = $lang->language;
            }
        }
        if ($users && $users->num_rows()>0) {
            $users =  $users->result();
			foreach ($users as $lan) {
                $tran[$lan->language] = $lan->language;
            }
        }
        if (!empty($tran)) {
            unset($tran['english']);
            return $tran;
        }
    }
	
    function get_active_languages($lang = FALSE) {

        if (!$lang) {
            return $this->db->order_by('name', 'ASC')->get('tbl_languages')->result();
        }
        $result = $this->db->where('name', $lang)->get('tbl_languages')->result();

        return $result;
    }

    function available_translations() {

        $result = $this->db->get('tbl_languages')->result();

        foreach ($result as $v_result) {
            $existing[] = $v_result->name;
        }
        $availabe_language = $this->db->group_by('language')->get('tbl_locales')->result();
        foreach ($availabe_language as $v_language) {
            if (!in_array($v_language->language, $existing)) {
                $available[] = $v_language;
            }
        }
        return $available;
    }

    function translation_stats($files) {

        $languages = $this->get_active_languages();        
        $stats = array();
        $fstats = array();
        foreach ($languages as $lang) {

            $lang = $lang->name;
            $translated = 0;
            $total = 0;
            foreach ($files as $file => $altpath) {
                
                $diff = 0;
                $shortfile = str_replace("_lang.php", "", $lang);
                
                $en = $this->lang->load('en', 'english', TRUE, TRUE, $altpath);
                
                if ($lang != 'english') {
                    $tr = $this->lang->load($shortfile, $lang, TRUE, TRUE, './system/language/');
                    
                    if (!empty($tr)):
                        foreach ($en as $key => $value) {
                            $translation = isset($tr[$key]) ? $tr[$key] : $value;
                            if (!empty($translation) && $translation != $value) {
                                $diff++;
                            }
                        }endif;
                    $fstats[$shortfile] = array(
                        "total" => count($en),
                        "translated" => $diff,
                    );
                } else {
                    $diff = count($en);

                    $fstats[$shortfile] = array(
                        "total" => count($en),
                        "translated" => $diff,
                    );
                }
                $total += count($en);
                $translated += $diff;
            }
            $stats[$lang]['total'] = $total;
            $stats[$lang]['translated'] = $translated;
            $stats[$lang]['files'] = $fstats;
        }
        return $stats;
    }

    function add_language($language, $files) {

        $this->load->helper('file');
        $lang = $this->db->get_where('tbl_locales', array('language' => str_replace("_", " ", $language)))->result();

        $l = $lang[0];

        $slug = strtolower(str_replace(" ", "_", $language));

        $dirpath = './application/language/' . $slug;
        $sys_path = './system/language/' . $slug;

        $icon = explode("_", $l->locale);

        if (isset($icon[1])) {
            $icon = strtolower($icon[1]);
        } else {
            $icon = strtolower($icon[0]);
        }

        if (is_dir($dirpath)) {
            return FALSE;
        }
        mkdir($dirpath, 0755);
        if (is_dir($sys_path)) {
            return FALSE;
        }
        mkdir($sys_path, 0755);

        foreach ($files as $file => $path) {
            $source = $path . 'english/' . $file;
            $destin = './application/language/' . $language . '/' . $file;
            if ($file == 'en_lang.php') {
                $sys_destin = './system/language/' . $language . '/' . $language . '_lang.php';
            }
            $data = read_file($source);
            $data = str_replace('/english/', '/' . $language . '/', $data);
            $data = str_replace('system/language', 'application/language', $data);
            write_file($destin, $data);
            write_file($sys_destin, $data);
        }

        $insert = array(
            'code' => $l->code,
            'name' => $slug,
            'icon' => $icon,
            'active' => '0'
        );

        return $this->db->insert('tbl_languages', $insert);
    }

    function save_translation($language, $file) {

        $data = '';
        $this->load->helper('file');
        $lang = $this->db->get_where('tbl_languages', array('name' => $language))->result();

        $lang = $lang[0];
        $altpath = $file . '_lang.php';

        if ($language == 'english') {
            $fullpath = $altpath . "english/" . $file . "_lang.php";
        } else {
            $fullpath = "./application/language/" . $language . "/" . $file . "_lang.php";
        }
        $eng = $this->lang->load('en.php', 'english', TRUE, TRUE, $altpath);
        if ($language == 'english') {
            $trn = $eng;
        } else {
            $trn = $this->lang->load($file, $language, TRUE, TRUE);
        }

        foreach ($eng as $key => $value) {
            $input_lang = $this->input->post($key, true);
            if (isset($input_lang)) {
                $newvalue = $input_lang;
            } elseif (isset($trn[$key])) {
                $newvalue = $trn[$key];
            } else {
                $newvalue = $value;
            }
            $nvalue = str_replace("'", "\'", $newvalue);
            $data .= '$lang[\'' . $key . '\'] = \'' . $nvalue . '\';' . "\r\n";
        }
        $data .= "\r\n" . "\r\n";

        $data .= "/* End of file " . $file . "_lang.php */" . "\r\n";
        $data .= "/* Location: ./application/language/" . $language . "/" . $file . "_lang.php */" . "\r\n";

        $data = '<?php' . "\r\n" . $data;
        write_file($fullpath, $data);


        return true;
    }

    function get_any_field($table, $where_criteria, $table_field) {

        $query = $this->db->select($table_field)->where($where_criteria)->get($table);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->$table_field;
        }
    }

    function timezones() {
        $timezoneIdentifiers = DateTimeZone::listIdentifiers();
        $utcTime = new DateTime('now', new DateTimeZone('UTC'));

        $tempTimezones = array();
        foreach ($timezoneIdentifiers as $timezoneIdentifier) {
            $currentTimezone = new DateTimeZone($timezoneIdentifier);

            $tempTimezones[] = array(
                'offset' => (int) $currentTimezone->getOffset($utcTime),
                'identifier' => $timezoneIdentifier
            );
        }

        // Sort the array by offset,identifier ascending
        usort($tempTimezones, function($a, $b) {
            return ($a['offset'] == $b['offset']) ? strcmp($a['identifier'], $b['identifier']) : $a['offset'] - $b['offset'];
        });

        $timezoneList = array();
        foreach ($tempTimezones as $tz) {
            $sign = ($tz['offset'] > 0) ? '+' : '-';
            $offset = gmdate('H:i', abs($tz['offset']));
            $timezoneList[$tz['identifier']] = '(UTC ' . $sign . $offset . ') ' .
                    $tz['identifier'];
        }

        return $timezoneList;
    }

    function set_locale($user = FALSE) {
        if (!$user) {
            $locale_config = $this->db->where('config_key', 'locale')->get('tbl_config')->row();
            $locale = $this->db->where('locale', $locale_config->value)->get('tbl_locales')->result();
        } else {
            $locale_user = $this->db->where('user_id', $user)->get('tbl_account_details')->result();

            if (empty($locale_user[0]->locale)) {
                $loc = 'en-US';
            } else {
                $loc = $locale_user[0]->locale;
            }
            $locale = $this->db->where('locale', $loc)->get('tbl_locales')->result();
        }
        $loc = $locale[0];
        $loc_unix = $loc->locale . ".UTF-8";
        $loc_win = str_replace("_", "-", $loc->locale);
        setlocale(LC_ALL, $loc_unix, $loc_win, $loc->code);
        return $loc;
    }

}
