<?php   

        $id = '';
        $date = '';
        $name = '';
        $category = '';
        $subCategory = '';
        $message = '';


        try {
                if($_SERVER['REQUEST_METHOD'] === 'POST') {

                   $name = $_POST['name'];
                   $category2 = $_POST['category'];
                   $subCategory3 = $_POST['subCategory']; 
                   $message = $_POST['message'];

                    if($category2 == 'aa') {
                            $category = 'フロントエンド';
                    } else if($category2 == 'bb') {
                            $category = 'デザイン';
                    } else if($category2 == 'cc') {
                            $category = 'バックエンド';
                    }
                    
                    if($subCategory3 == 'one') {
                            $subCategory = 'HTML,CSS';
                    } else if($subCategory3 == 'two') {
                            $subCategory = 'TypeScript';
                    } else if($subCategory3 == 'thre') {
                            $subCategory = 'JavaScript';
                    } else if($subCategory3 == 'four') {
                            $subCategory = 'React';
                    } else if($subCategory3 == 'five') {
                            $subCategory = 'Vue.js';
                    } else if($subCategory3 == 'six') {
                            $subCategory = 'Next.js';
                    }


                    if($subCategory3 == 'des1') {
                            $subCategory = 'Photoshop';
                    } else if($subCategory3 == 'des2') {
                            $subCategory = 'Figma';    
                    } else if($subCategory3 == 'des3') {
                            $subCategory = 'Illustrator';
                    }

                    if($subCategory3 == 'bac1') {
                            $subCategory = 'PHP';
                    }
                    else if($subCategory3 == 'bac2') {
                            $subCategory = 'Python';
                    }
                    else if($subCategory3 == 'bac3') {
                            $subCategory = 'Go';
                    }
                    else if($subCategory3 == 'bac4') {
                            $subCategory = 'Java';
                    }
                    else if($subCategory3 == 'bac5') {
                            $subCategory = 'Ruby';
                    }
                    else if($subCategory3 == 'bac6') {
                            $subCategory = 'C';
                    }
                    else if($subCategory3 == 'bac7') {
                            $subCategory = 'C++';
                    }
                    else if($subCategory3 == 'bac8') {
                            $subCategory = 'C#';
                    }
                    else if($subCategory3 == 'bac9') {
                            $subCategory = 'Swift';
                    }
                    else if($subCategory3 == 'ba10') {
                            $subCategory = 'Kotlin';
                    }
                    else if($subCategory3 == 'ba11') {
                            $subCategory = 'Scala';
                    }
                    else if($subCategory3 == 'ba12') {
                            $subCategory = 'ObjectC';
                    }
                    else if($subCategory3 == 'ba13') {
                            $subCategory = 'Perl';
                    }
 
                require_once('./DBInfo.php');
                $pdo = new PDO(DBInfo::DSN, DBInfo::USER, DBInfo::PASSWORD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $escapedMessage = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
                $escapedName = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');

                // PDO::beginTransaction メソッドでトランザクション開始
                $pdo->beginTransaction();

                $sql = "INSERT INTO bbs6 (date, name, category, subCategory, message)
                        VALUES ( NOW(), :name, :category, :subCategory, :message)";
                
                $statement = $pdo->prepare($sql);

                $statement->bindValue(':name', $escapedName, PDO::PARAM_STR ); 
                $statement->bindValue(':category', $category, PDO::PARAM_STR);
                $statement->bindValue(':subCategory', $subCategory, PDO::PARAM_STR);
                $statement->bindValue(':message', $escapedMessage, PDO::PARAM_STR);

               
                $statement->execute();
                $pdo->commit();
                header('location:./bbs.php');
                }
        } 
        catch(PDOException $e) { 

                // $pdo が set されていて、トランザクション中であれば真
                if (isset($pdo) == true && $pdo->inTransaction() == true) {             
                    // PDO::rollBack メソッドでロールバック
                    $pdo->rollBack();
                }

                $code = $e->getCode();
                $message = $e->getMessage();
                print("{$code}/{$message}<br>");    
        }
        
        $pdo = null;
       