<div id="Header">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 id="title"> Product List </h2>
      </div>
      <div class="col">
        <button type="button" class="btn btn-secondary" onclick="window.location.href='/add-products'">Add</button>
        <button type="button" class="btn btn-secondary" id="delete-product-btn" onclick="handleMassDelete()">Mass Delete</button>
      </div>
    </div>
  </div>
</div>
<hr style="border:1px solid black;">

<!-- div for showing all the cards  -->
<div class="container">
  <div class="row">

    <div class="card-container">
      <?php foreach ($params['products'] as $post) : ?>
        <div class="card text-center border-dark mb-3 product" data-id="<?= $post->__get('id'); ?>">
          <div class="card-body">
            <input class="form-check-input mt-2 ml-2 delete-checkbox" type="checkbox" value="<?php echo $post->__get('id'); ?>" id="product_<?php echo $post->__get('id'); ?>">
            <?php $post->displayCard($post->__get('product_type'), $post) ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>

  </div>
</div>
<hr style="border:1px solid black;">

<script>
  function handleMassDelete() {
    let checkboxes = document.querySelectorAll(".form-check-input:checked");
    let selectedIds = Array.from(checkboxes).map(checkbox => checkbox.value);

    console.log(selectedIds);

    selectedIds.forEach(id => {
      let productDiv = document.querySelector(`.product[data-id="${id}"]`);
      if (productDiv) {
        productDiv.remove();
      }
    });


    // Create a hidden input field with the selectedIds value
    let input = document.createElement("input");
    input.type = "hidden";
    input.name = "ids";
    input.value = selectedIds.join(',');

    // Create a form element and set its attributes
    let form = document.createElement("form");
    form.method = "post";
    form.action = "/" + selectedIds.join(',');
    form.appendChild(input);

    // Prevent page reload after form submission
    form.addEventListener("submit", function(event) {
      event.preventDefault();
    });

    // Add the form to the document and submit it
    if(selectedIds.length > 0){
    document.body.appendChild(form);
    form.submit();}
  }
</script>