
function handleFormSubmit(event) {
  event.preventDefault();

  let errors = {};

  if (nameInput.offsetParent !== null && nameInput.value.trim() === "") {
    errors.name = "Please, submit required data";
  } else if (!(/^[A-Za-z0-9]+$/.test(nameInput.value))) {
    errors.name = "Please provide the name of indicated type!";
  }

  if (skuInput.offsetParent !== null && skuInput.value.trim() === "") {
    errors.sku = "Please, submit required data";
  } else if(!(/^[A-Z0-9]/.test(skuInput.value))) {
    errors.sku = "Please provide the SKU of indicated type!";
  } else if (sku.includes(skuInput.value.trim())) {
    errors.sku = "SKU already exists, please choose another";
  }

  if (priceInput.offsetParent !== null && priceInput.value.trim() === "") {
    errors.price = "Please, submit required data";
  } else if (!(/^\d+(\.\d{1,2})?$/.test(priceInput.value))) {
    errors.price = "Please provide the price of indicated type!";
  }

  if (typeSelect.value === "dvd") {
    if (sizeInput.offsetParent !== null && sizeInput.value.trim() === "") {
      errors.size = "Please, submit required data";
    } else if (!(/^\d+$/.test(sizeInput.value))) {
      errors.size = "Please provide the size of indicated type!";
    }
  }

  if (typeSelect.value === "furniture") {
    if (heightInput.offsetParent !== null && heightInput.value.trim() === "") {
      errors.height = "Please, submit required data";
    } else if (!(/^\d+$/.test(heightInput.value))) {
      errors.height = "Please provide the height of indicated type!";
    }

    if (widthInput.offsetParent !== null && widthInput.value.trim() === "") {
      errors.width = "Please, submit required data";
    } else if (!(/^\d+$/.test(widthInput.value))) {
      errors.width = "Please provide the width of indicated type!";
    }

    if (lenghtInput.offsetParent !== null && lenghtInput.value.trim() === "") {
      errors.lenght = "Please, submit required data";
    } else if (!(/^\d+$/.test(lenghtInput.value))) {
      errors.lenght = "Please provide the length of indicated type!";
    }
  }

  if (typeSelect.value === "book") {
    if (weightInput.offsetParent !== null && weightInput.value.trim() === "") {
      errors.weight = "Please, submit required data";
    } else if (!(/^\d+(\.\d{1,2})?$/.test(weightInput.value))) {
      errors.weight = "Please provide the weight of indicated type!";
    }
  }

  if (Object.keys(errors).length > 0) {
    displayErrors(errors);
  } else {
    console.log('submitted');
    form.submit();
  }
}

function displayErrors(errors) {
  nameInput.classList.remove("invalid");
  nameInput.nextElementSibling.classList.add("hidden");
  skuInput.classList.remove("invalid");
  skuInput.nextElementSibling.classList.add("hidden");
  priceInput.classList.remove("invalid");
  priceInput.nextElementSibling.classList.add("hidden");

  weightInput.classList.remove("invalid");
  weightInput.nextElementSibling.classList.add("hidden");
  sizeInput.classList.remove("invalid");
  sizeInput.nextElementSibling.classList.add("hidden");
  widthInput.classList.remove("invalid");
  widthInput.nextElementSibling.classList.add("hidden");
  heightInput.classList.remove("invalid");
  heightInput.nextElementSibling.classList.add("hidden");
  lenghtInput.classList.remove("invalid");
  lenghtInput.nextElementSibling.classList.add("hidden");


  for (const [key, value] of Object.entries(errors)) {
    if (key === "name") {
      nameInput.classList.add("invalid");
      nameInput.nextElementSibling.textContent = value;
      nameInput.nextElementSibling.classList.remove("hidden");
    } else if (key === "sku") {
      skuInput.classList.add("invalid");
      skuInput.nextElementSibling.textContent = value;
      skuInput.nextElementSibling.classList.remove("hidden");
    } else if (key === "price") {
      priceInput.classList.add("invalid");
      priceInput.nextElementSibling.textContent = value;
      priceInput.nextElementSibling.classList.remove("hidden");
    } else if (key === "weight") {
      weightInput.classList.add("invalid");
      weightInput.nextElementSibling.textContent = value;
      weightInput.nextElementSibling.classList.remove("hidden");
    } else if (key === "size") {
      sizeInput.classList.add("invalid");
      sizeInput.nextElementSibling.textContent = value;
      sizeInput.nextElementSibling.classList.remove("hidden");
    } else if (key === "height") {
      heightInput.classList.add("invalid");
      heightInput.nextElementSibling.textContent = value;
      heightInput.nextElementSibling.classList.remove("hidden");
    } else if (key === "width") {
      widthInput.classList.add("invalid");
      widthInput.nextElementSibling.textContent = value;
      widthInput.nextElementSibling.classList.remove("hidden");
    } else if (key === "lenght") {
      lenghtInput.classList.add("invalid");
      lenghtInput.nextElementSibling.textContent = value;
      lenghtInput.nextElementSibling.classList.remove("hidden");
    }

  }
}