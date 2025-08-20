<?php

$id = '';
$password = ''; 

try {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['id']) == true && $_POST['id'] != '') {

        $id = $_POST['id'];
    }

    if(isset($_POST['password']) == true && $_POST['password'] != '' ) {

        $password = $_POST['password'];
    }
 }
                require_once __DIR__ . '/../../config/DBInfo.php';
             // require_once('./DBInfo.php');
                $pdo = new PDO(DBInfo::DSN, DBInfo::USER, DBInfo::PASSWORD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     

              if($password === 'password') {
            
                    $pdo->beginTransaction();                

                    // Delete from bbs table
                    $deleteQuery = "DELETE FROM bbs6 WHERE id = :id";
                    $deleteStatement = $pdo->prepare($deleteQuery);
                    $deleteStatement->bindValue(':id', $id, PDO::PARAM_STR);
                    $deleteStatement->execute();

                    $pdo->commit();
                    header('location:./bbs.php');
                } else {
                    header('location:./bbs.php');
                }
                                
            } catch(PDOException $e)  {

                // $pdo が set されていて、トランザクション中であれば真
                if (isset($pdo) == true && $pdo->inTransaction() == true) {
                            
                    // PDO::rollBack メソッドでロールバック
                    $pdo->rollBack();
                }
            }
                $pdo = null;
    


                