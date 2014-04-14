<script type="text/javascript">
var <?php echo $_name ?> = { <?php 
            $_javascriptHTML = $_javascriptHTML->getRawValue();
            if (list($key, $value) = each($_javascriptHTML)){
            	// echo "$key: \"$value\"";
              echo $key.":'".$value."'";
            }
            while (list($key, $value) = each($_javascriptHTML)){
            	// echo ", $key: \"$value\"";
              echo ", ".$key.":'".$value."'";
            }
        ?>
};
</script>
