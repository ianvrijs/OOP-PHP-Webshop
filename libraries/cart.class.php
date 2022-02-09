<?php
class cart {

    public static function addcart() 
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if(!isset($_GET['id']))
        {
            $id = '';
        }
        else 
        {
            $id = $_GET['id'];
        }
        if(!isset($_GET['action']))
        {
            $action = '';
        }
        else 
        {
            $action = $_GET['action'];
        }
        $eerste = 0;



        if ($action == "addcart") {
            if (isset($_SESSION["eerste"])) {                
                $eerste = $_SESSION["eerste"];
            } else {
                $_SESSION["eerste"] = 0;
            }
            $_SESSION["cart"][$eerste] = $id;
            // echo "hier:" . $eerste. 'wordt: '.$id;
            $_SESSION["eerste"] ++;
            
        }
   

    }

    public static function cartItems() 
    {
        if(!isset($_SESSION['cart']))
        {
            $msg = 'your cart is empty.';
            header("location: index.php?module=home&msg=".$msg);
            die();
        }
        $products = array();
        $qty = 0;
        foreach($_SESSION['cart'] as $i => $productId)
        {
            
            $sql = "SELECT * FROM `producten` WHERE `id` = $productId";
            $result = database::$oConnection->query($sql);
                if ($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                        $product = "
                        <div class='cartCard'>
                      
                            <img src='". $row['foto']."' class='cartFoto'>
                            <p class='cartText'>". $row['naam']. " &euro;". $row['prijs']." </p>
                            <a href='index.php?module=cart&page=remove-item&id=".$_SESSION['cart'][$i] ."'>Remove item</a>
                           
                        </div>
                        ";
                        
                    }
                    $products[] = $product;
                }
                        // qty?
                        // foreach($_SESSION['cart'] as $productId)
                        // {
                        //     $qty += 1;
                        //     print_r($qty . " ");   
                        // }
                         
                
        }
        
        return implode($products);
        
    }

    public static function fullPrice() 
    {
        $fullPrice  = 0;
            foreach($_SESSION['cart'] as $i => $productId)
            {
                $sql = "SELECT * FROM `producten` WHERE `id` = $productId";
                $result = database::$oConnection->query($sql);
                    if ($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            $fullPrice += $row['prijs'];
                        }
            }
    }
    return $fullPrice;
}
}