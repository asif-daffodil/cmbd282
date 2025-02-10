<?php  
    try{
        if (!isset($x)) {
            throw new Exception("Variable is not set");
        }
        echo $x;
    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        echo "<br>Finally block is always executed";
    }
    
?>