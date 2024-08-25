

<?php

$json = '[]';

if (isset($_GET['fstCategory']) == true && $_GET['fstCategory'] != '') {
    $parameter = $_GET['fstCategory'];

    if ($parameter == "aa") {
        $json = "[
            {\"name\": \"HTML,CSS\", \"value\": \"one\"},
            {\"name\": \"JavaScript\", \"value\": \"three\"},
            {\"name\": \"TypeScript\", \"value\": \"two\"},
            {\"name\": \"React\", \"value\": \"four\"},
            {\"name\": \"Vue.js\", \"value\": \"five\"},
            {\"name\": \"Next.js\", \"value\": \"six\"}
        ]";
        
       
    } else if ($parameter == "bb") {
        $json = "[
            {\"name\":\"Photoshop\", \"value\": \"des1\"},
            {\"name\":\"Figma\", \"value\": \"des2\"},
            {\"name\":\"Illustrator\", \"value\": \"des3\"}
                ]";
    } else if ($parameter == "cc") {
        $json = "[
            {\"name\": \"PHP\",\"value\": \"bac1\"},
            {\"name\": \"Python\",\"value\": \"bac2\"},
            {\"name\": \"Go\",\"value\": \"bac3\"},
            {\"name\": \"Java\",\"value\": \"bac4\"},
            {\"name\": \"Ruby\",\"value\": \"bac5\"},
            {\"name\": \"C\",\"value\": \"bac6\"},   
            {\"name\": \"C++\",\"value\": \"bac7\"},
            {\"name\": \"C#\",\"value\": \"bac8\"},
            {\"name\": \"Swift\",\"value\": \"bac9\"},
            {\"name\": \"Kotlin\",\"value\": \"ba10\"},
            {\"name\": \"Scala\",\"value\": \"bac11\"},
            {\"name\": \"ObjectC\",\"value\": \"bac12\"},
            {\"name\": \"Perl\",\"value\": \"bac13\"}
        ]";
        
       
    }
        
}

header('Content-Type: application/json; charset=UTF-8');
print($json);
