<?php
require_once('AnagramsClass.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Anagrammi</title>
</head>
<body>
    <div class="container mt-3 text-center">
        <h1 class="mb-5">Trova l'anagramma</h1>
        <main>
            <form method='post'>
                <div class="mb-4">
                    <label class="d-block" for="str1">Stringa 1</label>
                    <input type="text" name='str1' />
                </div>
        
                <div class="mb-4">
                    <label class="d-block" for="str2">Stringa 2</label>
                    <input type="text" name='str2' />
                </div>
        
                <input class="btn btn-primary" type='submit' value='cerca' />
            </form>

            <div class="mt-3 text-center" style="word-break: break-word;">
                <?php
                    if( !empty($_POST['str1']) && !empty($_POST['str2']) ){
                        if (strlen($_POST['str1']) <= 7 && strlen($_POST['str1']) > 1 && strlen($_POST['str2']) <= 1024) {
                        $anagramsList = new Anagrams();
                        $anagramsList->anagrams($_POST['str1'], $_POST['str2']);

                        } else{
                            echo '<div style="color:red;">Non puoi inserire stringhe con meno di 1 carettere o più di 7 caratteri nel primo campo e/o con più di 1024 caratteri nel secondo campo</div>';
                        }
                    }else{
                        echo '<div style="color:red">Inserisci le parole negli input</div>';
                    }
                ?>
            </div>

        </main>
    </div>
</body>
</html>