<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;


class HomeController extends Controller
{

    public function upload()
    {
//        $sendMail = $this->mail();
        $tmp_name = $_FILES['file']['tmp_name'];
        $result = $this->readCSV($tmp_name, ['delimiter' => ',']);
        $headerLabel = false;
        $emptyMail = true;
        for($i = 0; $i < count($result); $i++) {
            if (!$headerLabel && $i == 0) { continue; }
            if (!isset($result[$i][0]) || !isset($result[$i][3]) || trim($result[$i][0]) == '' || trim($result[$i][3]) == '' || !filter_var(trim($result[$i][3]), FILTER_VALIDATE_EMAIL)) { continue; };
            $data['name'] = trim($result[$i][0]);
            $data['email'] = trim($result[$i][3]);
            $this->mail($data);
            $emptyMail = false;
        }
        echo json_encode(['success' => 1, 'empty' => $emptyMail]);
    }

    public function readCSV($csvFile, $array)
    {
        $line_of_text = [];
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
        }
        fclose($file_handle);
        return $line_of_text;
    }

    public function mail($data)
	{
        Mail::to($data['email'])->send(new SendMailable($data));
        return true;
	}
}

