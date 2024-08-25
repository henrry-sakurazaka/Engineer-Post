<?php  -->
         for($i=0; $i < count($records); $i++) {
            echo'<div class="flex-container">';

                echo'<div id="id" class="add">';                 
                    echo'<div class="caption center">';
                            
    
                             echo '<?php ';     
                                
                                        if(isset($records[$i]["id"])) {
                                            $id = $records[$i]["id"];
                                            print("<div class=\"deteal\">{$id}<br></div>");
                                        }   
                                          
                                         
                                if(isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                    $keyword = $_GET["keyword"];    
                                    $records = $bbsSearch->searchByName($keyword);
                                }   
                            echo'?>';
                        echo'</div>';
                    echo'</div>';
                   echo'<div id="date" class="add">';
                    echo '<div class="caption center">';
                             
                               echo' <?php';
                                
                                        if(isset($records[$i]["date"]))
                                        $date = $records[$i]["date"];
                                        print("<div class=\"deteal\">{$date}<br></div>");
                                    }      
                                       
                                    if (isset($_GET["keyword"])=== true && $_GET["keyword"] != "") {
                                        $keyword = $_GET["keyword"];
                                        $records = $bbsSearch->searchByName($keyword);       
                                    }    
                            echo' ?>';
                        echo'</div>';
                    echo'</div>';
                    echo'<div id="name" class="add">';
                        echo'<div class="caption center">';
                              
                                    
                                  echo' <?php ';
                                        if(isset($records[$i]["name"])) {
                                            $name = $records[$i]["name"];
                                            print("<div class=\"deteal\">{$name}<br></div>");
                                        }
                                        
                                    
                                    
                                    if (isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                        $keyword = $_GET["keyword"];   
                                        $records = $bbsSearch->searchByName($keyword);  
                                     }             
                           echo' ?>';
                        echo'</div>';
                    echo'</div>';
                    echo'<div id="category" class="add">';
                    echo'<div class="caption">';
                              
                                    
                                echo' <?php ';  
                                        if(isset($records[$i]["category"])) {
                                            $category = $records[$i]["category"];
                                            print("<div class=\"deteal\">{$category}<br></div>");
                                        }
                                       
                                    
                                    
                                    if (isset($_GET["keyword"]) === true && $_GET["keyword"] != ""){
                                        $keyword = $_GET["keyword"];
                                        $records = $bbsSearch->searchByName($keyword);
                                     }  
                                echo'?>';
                        echo'</div>';
                    echo'</div>';
                    echo'<div id="subCategory" class="add">';
                       echo'<div class="caption center">';
                             
                                    
                                  echo'<?php '; 
                                        if(isset($records[$i]["subCategory"])) {
                                            $subCategory = $records[$i]["subCategory"];
                                            print("<div class=\"deteal\">{$subCategory}<br></div>");
                                        }
                                       
                                    
                                      
                                    if (isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                        $keyword = $_GET["keyword"];
                                        $records = $bbsSearch->searchByName($keyword);      
                                    }        
                                echo' ?>';
                       echo'</div>';
                    echo'</div>';
                    echo'<div id="message" class="add">';
                        echo'<div class="caption">';
                         
                                    
                               echo '<?php ';   
                                        if(isset($records[$i]["message"])) {
                                            $message = $records[$i]["message"];
                                            $message = htmlspecialchars($message, ENT_QUOTES, "utf-8");
                                            print("<div class=\"deteal\">{$message}<br></div>");
                                        }
                                       
                                 
                                
                                    if (isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                        $keyword = $_GET["keyword"];
                                        $records = $bbsSearch->searchByName($keyword);         
                                    } 
                                        
                                echo'?>';
                        echo'</div>'; 
                     echo'</div>';   

                 echo'</div>';                  
             echo '</div>'; 
         };
                   
            
                         
    //   ?> 