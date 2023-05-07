<?php
//استبدال نص معين بنص آخر في جميع الملفات الموجودة داخل مجلد معين على الاستضافة
foreach (glob(__DIR__ . '/*.php') as $filename) {
    $path_to_file = $filename;
    $file_contents = file_get_contents($path_to_file);
    $str1 = "Admin1";//النص المراد استبداله
    $str2 = "Admin2";//النص البديل
    if (strpos($file_contents, $str1) !== false) {
        $file_contents = str_replace($str1, $str2, $file_contents);
        file_put_contents($path_to_file, $file_contents);
        echo "$filename  <br>";
    }
}
