<?php
class product 
{
    public static function adminCards() 
    {
        $products = array();
        $sql = "SELECT * FROM `producten`";
        $result = database::$oConnection->query($sql);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $naam = str_replace(" ","&nbsp;", $row['naam']);
                    $beschrijving = str_replace(" ","&nbsp;", $row['beschrijving']);
                    $foto = str_replace(" ","&nbsp;", $row['foto']);
                    $product = "
                    <hr class='productFullHr'>
                    <div class='productFull'>
                    <p id='msg'></p>
                <div class='adminContainer'>
                    <form action='index.php?module=shop&page=product-action-delete' id='verwijder' method='post'>
                    <input type='hidden' name='id' value=". $row['id'] .">
                    <input type='submit' class='adminVerwijder' value='verwijder'> 
                    </form> 

                        <div class='dropdown'>
                            <a class='dropbtn'>wijzig &#9662;</a>
                            <div class='dropdown-content'>
                            <form method='post' action='index.php?module=shop&page=product-action'>
                                <input type='hidden' name='id' value=". $row['id']."> <br />
                                <input type='text' class='adminForm' name='naam' value=". $naam ."><br />
                                <input type='text' class='adminForm auto' name='beschrijving' value=". $beschrijving ."><br />
                                <input type='text' class='adminForm' name='foto' value=". $foto ."><br />
                                <input type='number' class='adminForm' name='voorraad' value=". $row['voorraad'] ."><br />
                                <input type='number' class='adminForm' name='prijs' value=". $row['prijs'] ."><br />
                                <input type='submit' class='adminForm'><br />
                            </form>
                        </div>
                    </div>
                </div>


                        <a href='index.php?module=shop&page=product&id" . '=' . $row["id"] . "'>
                        <img class='productImgFull'  alt='". $row['naam']."' src='" . $row['foto'] . "'>" . '
                        <br>
                        <b class="bProduct"">' . $row["naam"] . '</b>
                        <br/>'. "
                        <i class='prijs'' >&#8364;".$row["prijs"] . "</i>
                        <div class='descContainer'>
                        <p class='productDesc'>
                        ". $row['beschrijving']  ."
                        </p>
                        </div>
                        </div></a>";
                    $products[] = $product;
                }
               
            }
            else
            {
                return "No products in stock yet, stay tuned.";
            }
           
            return implode($products);

    }
    public static function cards() 
    {
        $products = array();
        $sql = "SELECT * FROM `producten`";
        $result = database::$oConnection->query($sql);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $product = "
                    <hr class='productFullHr'>
                    <div class='productFull'>
                        <a href='index.php?module=shop&page=product&id" . '=' . $row["id"] . "'>
                        <img class='productImgFull' alt='". $row['naam']."'src='" . $row['foto'] . "'>" . '
                        <br>
                        <b class="bProduct"">' . $row["naam"] . '</b>
                        <br/>'. "
                        <i style='color: #000;' >&#8364;".$row["prijs"] . "</i>
                        <div class='descContainer'>
                        <p class='productDesc'>
                        ". $row['beschrijving']  ."
                        </p>
                        </div>
                        </div></a>";
                    $products[] = $product;
                }
               
            }
            else
            {
                return "No products in stock yet, stay tuned.";
            }
            return implode($products);

    }

    public static function recentCards() 
    {
        $products = array();
        $sql = "SELECT * FROM `producten` ORDER BY `id` DESC LIMIT 5 ";
        $result = database::$oConnection->query($sql);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $product = 
                    "<div class='product'>
                        <a href='index.php?module=shop&page=product&id" . '=' . $row["id"] . "'>
                            " .  "
                            <img class='productImg' alt='geen foto gevonden.  'src='" . $row['foto'] . "'>" . 
                            '<br><b class="recentProduct"">' . $row["naam"] . '</b><br/>
                            '. "<i style='color: #000;' >&#8364;".$row["prijs"] . "</i>    
                        </a>
                    </div>
                    ";
                    $products[] = $product;
                }

               
            }
      
            else
            {
                echo "No products in stock yet, stay tuned.";
            }
           
            return implode($products);

    }
    public static function product() 
    {
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM `producten` WHERE `id` = $id";
        $result = database::$oConnection->query($sql);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $product = "
                    <div class='productFull'>
                        <form method='post' action='index.php?module=shop&page=product&id=". $id . "&action=addcart'>
                            <img class='productImgFull' alt='geen foto gevonden.  'src='" . $row['foto'] . "'>" . '
                            <b class="bProduct"">' . $row["naam"] . '</b>
                        <br/>'. "
                        <i style='color: #000;' >&#8364;".$row["prijs"] . "</i>
                        <div class='descContainer'>
                            <p class='productDesc'>
                            ". $row['beschrijving']  ."
                            </p>
                        </div>
                        <br />
                        <input type='hidden'name='sku' value='" . $row["sku"] . "'>
                        <input type='submit' class='addToCart' value='Add to cart' />
                            
                       </div>
                    
                

                    ";
                        
                }
               
            }
      
            else
            {
                return "Product not found";
            }
           
            return $product;
        }


   
}


?>