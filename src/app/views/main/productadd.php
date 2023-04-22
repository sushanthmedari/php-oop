<div id="Header">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 id="title"> Product Add </h2>
      </div>
      <div class="col">
        <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">Cancel</button>
        <button type="button" class="btn btn-secondary" id="save-button">Save</button>
      </div>
    </div>
  </div>
</div>
<hr style="border:1px solid black;">

<!-- form  -->

<form id="product_form" action="/add-products/" method="post">

  <div class="form-group">
    <label for="sku" class="col-sm-2">SKU:</label>
    <input type="text" id="sku" name="sku" />
    <p class="error hidden"></p>
  </div>

  <div class="form-group">
    <label for="name" class="col-sm-2">Name:</label>
    <input type="text" id="name" name="name" />
    <p class="error hidden"></p>
  </div>

  <div class="form-group">
    <label for="price" class="col-sm-2">Price ($):</label>
    <input type="text" id="price" name="price" />
    <p class="error hidden"></p>
  </div>

  <div class="form-group row">
    <label for="productType" class="col-sm-2">Type Switcher:</label>
    <div class="col-sm-10">
      <select name="product_type" id="productType" required>
        <option value="dvd">DVD</option>
        <option value="furniture">Furniture</option>
        <option value="book">Book</option>
      </select>
    </div>
  </div>

  <div class="form-group" id="dvd" style="display: block;">
    <p class="section-w">Please Add Size!</p>
    <label for="size" class="col-sm-2">Size (MB):</label>
    <input type="text" name="size" id="size" />
    <p class="error hidden"></p>
  </div>

  <div id="furniture" style="display: none;">
    <p class="section-w">Please Add Dimensions!</p>
    <div class="form-group">
      <label for="height" class="col-sm-2">Height (CM):</label>
      <input type="text" name="height" id="height" />
      <p class="error hidden"></p>
    </div>
    <div class="form-group">
      <label for="width" class="col-sm-2">Width (CM):</label>
      <input type="text" name="width" id="width" />
      <p class="error hidden"></p>
    </div>
    <div class="form-group">
      <label for="lenght" class="col-sm-2">Length (CM):</label>
      <input type="text" name="lenght" id="lenght" />
      <p class="error hidden"></p>
    </div>
  </div>

  <div class="form-group" id="book" style="display: none;">
    <p class="section-w">Please Add Weight!</p>
    <label for="weight" class="col-sm-2">Weight (KG):</label>
    <input type="text" name="weight" id="weight" />
    <p class="error hidden"></p>
  </div>

</form>

<hr style="border:1px solid black;">

<script>
  const typeSelect = document.querySelector("#productType");
  const optionElements = {
    dvd: document.querySelector("#dvd"),
    furniture: document.querySelector("#furniture"),
    book: document.querySelector("#book")
  };

  typeSelect.addEventListener("change", function() {
    const type = typeSelect.value;
    // Showing/hiding form fields based on the selected type
    for (const option in optionElements) {
      if (option === type) {
        optionElements[option].style.display = "block";
      } else {
        optionElements[option].style.display = "none";
      }
    }
  });

  let sku = [];
  <?php foreach ($params['sku'] as $post) : ?>
    sku.push("<?= $post ?>");
  <?php endforeach ?>

  console.log(sku);

  // Input Validation 

  const form = document.getElementById("product_form");
  const saveButton = document.querySelector("#save-button");
  const nameInput = document.getElementById("name");
  const skuInput = document.getElementById("sku");
  const priceInput = document.getElementById("price");

  const weightInput = document.getElementById("weight");
  const sizeInput = document.getElementById("size");
  const heightInput = document.getElementById("height");
  const widthInput = document.getElementById("width");
  const lenghtInput = document.getElementById("lenght");

  // Submit the form when the button is clicked

  saveButton.addEventListener("click", function() {
    handleFormSubmit(event);
  });

  
  // form.addEventListener("submit", handleFormSubmit);
</script>