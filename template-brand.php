<?php 
/*
** Template Name: EBM Single Brand Page
*/
    get_header();

?>

<div class="container-fluid">

    <div class="row px-2 my-3">

        <img class="img-fluid w-100" src="<?php echo get_template_directory_uri() ?>/img/new_brands/<?php echo $name; ?>-bg-md.jpg" />

    </div>

    <div class="row px-2 justify-content-center mb-2">

        <h4 class="font-weight-normal text-uppercase icon-<?php echo $name; ?>">Shop by Category</h4>

    </div>

    <div class="row pl-2" style="overflow-x: scroll; overflow-y: hidden;">

        <div class="d-flex pr-2" style="width:1000px;">

            <div class="bg-light" style="width: 250px; height: 250px;"></div>

            <div class="bg-warning" style="width: 250px; height: 250px;"></div>

            <div class="bg-primary" style="width: 250px; height: 250px;"></div>

            <div class="bg-success" style="width: 250px; height: 250px;"></div>

        </div>

    </div>

    <hr>

    <div class="row my-3 justify-content-center">

        <h4 class="text-secondary font-weight-light text-uppercase">Featured</h4>

    </div>

    <hr>

    <div class="row px-2">

        <div style="width:50%; height: 200px; background: #00aeff;"></div>

        <div style="width:50%; height: 200px; background: #fbaf42;"></div>

        <div style="width:50%; height: 200px; background: #000;"></div>

        <div style="width:50%; height: 200px; background: #ffce01;"></div>

    </div>

</div>
    
<?php 

    get_footer(); 
    
?>

