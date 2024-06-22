document.addEventListener('DOMContentLoaded', function() {
  const checkbox = document.getElementById('agreementCheckbox');
  const submitButton = document.getElementById('submitButton');
  const thesite = document.getElementById('showwhenaccept');
  const agree = document.getElementById('agreee');

  
  if (localStorage.getItem('tosAccepted') === 'true') {
    thesite.style.display = "block";
    agree.style.display = "none";
  } else {
    thesite.style.display = "none";
    agree.style.display = "block";
  }

  checkbox.addEventListener('change', function() {
    submitButton.disabled = !checkbox.checked;
  });

  submitButton.addEventListener('click', function() {
    alert('Thank you for accepting the terms and services!');
    thesite.style.display = "block";
    agree.style.display = "none";
    localStorage.setItem('tosAccepted', 'true');
  });
});


searchInput.addEventListener("input", () => {
  const searchTerm = searchInput.value.toLowerCase();

  const filteredSuggestions = suggestions.filter((suggestion) => {
    return suggestion.text.toLowerCase().includes(searchTerm);
  });

  suggestionsList.innerHTML = "";
  filteredSuggestions.forEach((suggestion) => {
    const listItem = document.createElement("li");
    const link = document.createElement("a");
    link.href = suggestion.url;
    link.textContent = suggestion.text;
    link.target = "_blank";

    link.addEventListener("click", (e) => {
      e.preventDefault();
      searchInput.value = suggestion.text;
      document.querySelector("form").submit();
    });

    listItem.appendChild(link);
    suggestionsList.appendChild(listItem);
  });

  if (filteredSuggestions.length > 0 && searchTerm.length > 0) {
    suggestionsList.style.display = "block";
  } else {
    suggestionsList.style.display = "none";
  }
});

const bookNowButton = document.getElementById('book-now');
const closeModalButton = document.getElementById('close-modal');
const bookingModal = document.getElementById('booking-modal');
const bookingForm = document.getElementById('booking-form');

bookNowButton.addEventListener('click', () => {
  bookingModal.style.display = 'block';
});

closeModalButton.addEventListener('click', () => {
  bookingModal.style.display = 'none';
});

const changetext = () => {
  const value = document.getElementById('people').value;
  const submitButton = document.getElementById('book-button');
  if(value == "contact"){
    submitButton.innerHTML = 'Contact Us!';
  } else{
    submitButton.innerHTML = 'Book Now';
  }
}

bookingForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const date = document.getElementById('date').value;
  const people = document.getElementById('people').value;
  if(people == "contact"){
    window.location.href = '././contact.php';
  } else{
    console.log(`Booking for ${people} people on ${date}`);
  }
});
