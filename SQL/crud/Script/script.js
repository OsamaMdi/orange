function toggleForm() {
    var formContainer = document.querySelector('.form-container');
    if (formContainer.style.display === 'none' || formContainer.style.display === '') {
      formContainer.style.display = 'block';
    } else {
      formContainer.style.display = 'none';
    }
  }
  function toggleDetails(button) {
    var row = button.parentElement.parentElement;
    var details = row.nextElementSibling;
    var icon = button.querySelector('i');
    if (details.style.display === 'none' || details.style.display === '') {
      details.style.display = 'table-row';
      icon.classList.remove('bx-show');
      icon.classList.add('bx-hide');
    } else {
      details.style.display = 'none';
      icon.classList.remove('bx-hide');
      icon.classList.add('bx-show');
    }
  }