document.getElementById('samecheck').addEventListener('change', function () {
    const isChecked = this.checked;

    const villageName = document.getElementById('VillageName').value;
    const villageCode = document.getElementById('villageCode').value;
    const state = document.getElementById('stateSelect1').value;
    const district = document.getElementById('districtSelect1').value;
    const subdivision = document.getElementById('subdivision').value;
    const area = document.getElementById('area').value;
    const pinCode = document.getElementById('pinCode').value;

    const cspVillageNameField = document.getElementById('cspVillageName');
    const cspVillageCodeField = document.getElementById('cspvillageCode');
    const cspStateField = document.getElementById('stateSelect2');
    const cspDistrictField = document.getElementById('districtSelect2');
    const cspSubdivisionField = document.getElementById('cspsubdivisionSelect');
    const cspAreaField = document.getElementById('csparea');
    const cspLandmarkCodeField = document.getElementById('cspPincode');

    if (isChecked) {
        // Set the values for the CSP fields
        cspVillageNameField.value = villageName;
        cspVillageCodeField.value = villageCode;
        cspStateField.value = state;
        cspSubdivisionField.value = subdivision;
        cspAreaField.value = area;
        cspLandmarkCodeField.value = pinCode;

        // Populate the district based on the selected state
        updateDistricts('stateSelect2', 'districtSelect2');

        // Set the district value once the options are populated
        setTimeout(() => {
            cspDistrictField.value = district;
        }, 100); // Slight delay to ensure district options are populated
    } else {
        // Clear all CSP fields
        cspVillageNameField.value = '';
        cspVillageCodeField.value = '';
        cspStateField.value = '';
        cspDistrictField.value = '';
        cspSubdivisionField.value = '';
        cspAreaField.value = '';
        cspLandmarkCodeField.value = '';
    }
});

function createErrorMessageElement(input, appendAfterInput) {
  let messageElement = document.getElementById(`${input.id}Message`);

  if (!messageElement) {
      messageElement = document.createElement('div');
      messageElement.className = 'text-danger mt-1';
      messageElement.id = `${input.id}Message`;
  }

  if (appendAfterInput) {
      const inputGroup = input.parentNode; 
      if (inputGroup.nextSibling !== messageElement) {
          inputGroup.parentNode.appendChild(messageElement);
      }
  } else {
      const parentDiv = input.closest('.my-2');
      parentDiv.appendChild(messageElement); 
  }

  return messageElement;
}


function charOnly(event) {
  const char = String.fromCharCode(event.keyCode || event.which);
  const allowedChars = /^[A-Za-z\s]+$/;
  const input = event.target;
  const messageElement = createErrorMessageElement(input);
  
  if (input.hasAttribute('required')) { 
      if (!allowedChars.test(char)) {
          event.preventDefault();
          input.classList.add("is-invalid");
          messageElement.textContent = "Only letters and spaces are allowed.";
      } else {
          input.classList.remove("is-invalid");
          messageElement.textContent = "";
      }
  }
}
function validateField(input) {
  const messageElement = createErrorMessageElement(input);
  
  if (input.hasAttribute('required')) { 
      if (input.tagName === "SELECT") {
          if (!input.value) {
              input.classList.add("is-invalid");
              messageElement.textContent = "Please select an option.";
          } else {
              input.classList.remove("is-invalid");
              messageElement.textContent = "";
          }
      } else {
          if (!input.value) {
              input.classList.add("is-invalid");
              messageElement.textContent = "This field is required.";
          } else {
              input.classList.remove("is-invalid");
              messageElement.textContent = "";
          }
      }
  } else {
      input.classList.remove("is-invalid");
      messageElement.textContent = "";
  }
}



document.querySelectorAll('input[required], select[required]').forEach(input => {
  input.addEventListener('change', () => validateField(input)); 
});

document.querySelector('.submit-button').addEventListener('click', function(event) {
  const requiredInputs = document.querySelectorAll('input[required], select[required]');
  let allFilled = true;

  requiredInputs.forEach(input => {
      validateField(input);
      const messageElement = createErrorMessageElement(input);
      
      if (input.classList.contains("is-invalid")) {
          allFilled = false;
      }
  });

  if (!allFilled) {
      event.preventDefault(); 
  }
});

function numberOnly(event) {
  const char = String.fromCharCode(event.keyCode || event.which);
  const input = event.target;
  const messageElement = createErrorMessageElement(input);
  
  if (input.hasAttribute('required')) { 
      if (!/^[0-9]+$/.test(char)) {
          event.preventDefault();
          input.classList.add("is-invalid");
          messageElement.textContent = "Only numbers are allowed.";
      } else {
          input.classList.remove("is-invalid");
          messageElement.textContent = "";
      }
  }
}


function emailOnly(input) {
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const messageElement = createErrorMessageElement(input);
  
  if (input.hasAttribute('required')) { 
      if (!emailPattern.test(input.value)) {
          input.classList.add("is-invalid");
          messageElement.textContent = "Invalid email format.";
          input.setCustomValidity("Invalid email format");
      } else {
          input.classList.remove("is-invalid");
          messageElement.textContent = "";
          input.setCustomValidity("");
      }
  } else {
      input.classList.remove("is-invalid");
      messageElement.textContent = "";
  }
}

const districts = {
    "Andhra Pradesh": ["Anantapur", "Chittoor", "East Godavari", "Guntur", "Krishna", "Kurnool", "Nellore", "Prakasam", "Sri Potti Sreeramulu Nellore", "West Godavari", "YSR Kadapa"],
    "Arunachal Pradesh": ["Anjaw", "Changlang", "Dibang Valley", "East Kameng", "East Siang", "Kurung Kumey", "Lohit", "Namsai", "Papum Pare", "Upper Siang", "Upper Subansiri", "West Kameng", "West Siang"],
    "Assam": ["Baksa", "Barpeta", "Biswanath", "Bongaigaon", "Cachar", "Charaideo", "Chirang", "Darrang", "Dhemaji", "Dhubri", "Dibrugarh", "Goalpara", "Golaghat", "Hailakandi", "Jorhat", "Kamrup", "Kamrup Metropolitan", "Karbi Anglong", "Karimganj", "Lakhimpur", "Nagaon", "Nalbari", "Sivasagar", "Sonitpur", "Tinsukia", "Udalguri", "Uttarkul"],
    "Bihar": ["Araria", "Arwal", "Aurangabad", "Banka", "Begusarai", "Bhagalpur", "Buxar", "Darbhanga", "East Champaran", "Gaya", "Gopalganj", "Jamui", "Jehanabad", "Kaimur", "Katihar", "Khagaria", "Kishanganj", "Lakhisarai", "Madhepura", "Madhubani", "Munger", "Nalanda", "Nawada", "Patna", "Purnea", "Rohtas", "Saharsa", "Samastipur", "Saran", "Sheikhpura", "Sheohar", "Sitamarhi", "Siwan", "Supaul", "Vaishali", "West Champaran"],
    "Chhattisgarh": ["Balod", "Baloda Bazar", "Bemetara", "Bilaspur", "Dantewada", "Dhamtari", "Durg", "Gariaband", "Janjgir-Champa", "Jashpur", "Kabeerdham", "Kabirdham", "Korba", "Mahasamund", "Raigarh", "Raipur", "Rajnandgaon", "Sukma", "Surajpur", "Surguja"],
    "Goa": ["North Goa", "South Goa"],
    "Gujarat": ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Dahod", "Dangs", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kutch", "Mahisagar", "Mehsana", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Vadodara", "Valsad"],
    "Haryana": ["Ambala", "Bhiwani", "Charkhi Dadri", "Faridabad", "Fatehabad", "Gurugram", "Hisar", "Jhajjar", "Jind", "Kaithal", "Karnal", "Mahendragarh", "Nuh", "Panchkula", "Panipat", "Rewari", "Rohtak", "Sirsa", "Sonipat", "Yamunanagar"],
    "Himachal Pradesh": ["Bilaspur", "Chamba", "Hamirpur", "Kinnaur", "Kullu", "Lahaul and Spiti", "Mandi", "Shimla", "Sirmaur", "Solan", "Una"],
    "Jharkhand": ["Bokaro", "Chatra", "Dhanbad", "Dumka", "East Singhbhum", "Garhwa", "Giridih", "Godda", "Gumla", "Hazaribagh", "Jamtara", "Khunti", "Koderma", "Latehar", "Lohardaga", "Pakur", "Palamu", "Ranchi", "Sahibganj", "Saraikela Kharsawan", "Simdega", "West Singhbhum"],
    "Karnataka": ["Bagalkote", "Ballari", "Belagavi", "Bengaluru Rural", "Bengaluru Urban", "Bidar", "Chamarajanagar", "Chikkamagaluru", "Chitradurga", "Davanagere", "Dharwad", "Gadag", "Hassan", "Haveri", "Kodagu", "Kolar", "Koppal", "Mandya", "Mysuru", "Raichur", "Ramanagara", "Shimoga", "Tumakuru", "Udupi", "Uttara Kannada", "Yadgir"],
    "Kerala": ["Alappuzha", "Ernakulam", "Idukki", "Kannur", "Kasaragod", "Kollam", "Kottayam", "Kozhikode", "Malappuram", "Palakkad", "Pathanamthitta", "Thiruvananthapuram", "Thrissur", "Wayanad"],
    "Madhya Pradesh": ["Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhopal", "Burhanpur", "Chhindwara", "Damoh", "Datia", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna", "Sehore", "Shahdol", "Shajapur", "Sheopur", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"],
    "Maharashtra": ["Ahmednagar", "Akola", "Amravati", "Aurangabad", "Bhandara", "Buldhana", "Chandrapur", "Dhule", "Gadchiroli", "Gondia", "Hingoli", "Jalna", "Jalgaon", "Kolhapur", "Latur", "Mumbai", "Nagpur", "Nanded", "Nashik", "Osmanabad", "Parbhani", "Pune", "Raigad", "Ratnagiri", "Sindhudurg", "Solapur", "Thane", "Wardha", "Washim", "Yavatmal"],
    "Manipur": ["Bishnupur", "Chandel", "Churachandpur", "Imphal East", "Imphal West", "Senapati", "Tamenglong", "Thoubal", "Ukhrul"],
    "Meghalaya": ["East Garo Hills", "East Khasi Hills", "Jaintia Hills", "North Garo Hills", "Ri Bhoi", "South Garo Hills", "West Garo Hills", "West Khasi Hills"],
    "Mizoram": ["Aizawl", "Champhai", "Hnahthial", "Kolasib", "Lawngtlai", "Lunglei", "Mamit", "Saiha", "Serchhip"],
    "Nagaland": ["Dimapur", "Kiphire", "Longleng", "Mon", "Peren", "Phek", "Tuensang", "Wokha", "Zunheboto"],
    "Odisha": ["Angul", "Balangir", "Balasore", "Bargarh", "Bhadrak", "Boudh", "Cuttack", "Deogarh", "Dhenkanal", "Ganjam", "Ganjam", "Jagatsinghpur", "Jajpur", "Jharsuguda", "Kalahandi", "Kandhamal", "Kendrapara", "Kendujhar", "Khurda", "Nabarangpur", "Nayagarh", "Nuapada", "Rayagada", "Sambalpur", "Sundergarh"],
    "Punjab": ["Amritsar", "Barnala", "Bathinda", "Fatehgarh Sahib", "Fazilka", "Hoshiarpur", "Jalandhar", "Kapurthala", "Ludhiana", "Mansa", "Moga", "Muktsar", "Patiala", "Rupnagar", "SAS Nagar", "Sangrur", "Shaheed Bhagat Singh Nagar", "Tarn Taran"],
    "Rajasthan": ["Ajmer", "Alwar", "Banswara", "Baran", "Barmer", "Bharatpur", "Bikaner", "Bundi", "Churu", "Dausa", "Dholpur", "Dungarpur", "Hanumangarh", "Jaipur", "Jaisalmer", "Jalore", "Jodhpur", "Karauli", "Kota", "Nagaur", "Pali", "Rajsamand", "Sawai Madhopur", "Sikar", "Tonk", "Udaipur"],
    "Sikkim": ["East Sikkim", "North Sikkim", "South Sikkim", "West Sikkim"],
    "Tamil Nadu": ["Chennai", "Coimbatore", "Cuddalore", "Dharmapuri", "Dindigul", "Erode", "Kanchipuram", "Kanyakumari", "Karur", "Krishnagiri", "Madurai", "Nagapattinam", "Namakkal", "Perambalur", "Pudukkottai", "Ramanathapuram", "Salem", "Sivaganga", "Thanjavur", "Theni", "Tiruchirappalli", "Tirunelveli", "Tiruppur", "Vellore", "Virudhunagar"],
    "Telangana": ["Adilabad", "Hyderabad", "Karimnagar", "Khammam", "Mahabubnagar", "Medak", "Nalgonda", "Nizamabad", "Ranga Reddy", "Warangal"],
    "Tripura": ["Dhalai", "Gomati", "North Tripura", "Sepahijala", "South Tripura", "Unakoti", "West Tripura"],
    "Uttar Pradesh": ["Agra", "Aligarh", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Ayodhya", "Baghpat", "Bahraich", "Ballia", "Balrampur", "Banda", "Barabanki", "Bareilly", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapud", "Hardoi", "Hathras", "Jalaun", "Jaunpur", "Jhansi", "Kannauj", "Kanpur Nagar", "Kanpur Dehat", "Kushinagar", "Lakhimpur Kheri", "Lalitpur", "Lucknow", "Maharajganj", "Mahoba", "Mainpuri", "Mathura", "Mau", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Rae Bareli", "Rampur", "Saharanpur", "Shahjahanpur", "Shrawasti", "Siddharthnagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"],
    "Uttarakhand": ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal", "Pithoragarh", "Rudraprayag", "Tehri Garhwal", "Udham Singh Nagar", "Uttarkashi"],
    "West Bengal": ["Alipurduar", "Bankura", "Birbhum", "Burdwan", "Cooch Behar", "Dakshin Dinajpur", "Darjeeling", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kalimpong", "Kolkata", "Malda", "Medinipur", "Murshidabad", "Nadia", "North 24 Parganas", "Purba Medinipur", "Purulia", "South 24 Parganas", "Uttar Dinajpur"]
};

function updateDistricts(stateSelectId, districtSelectId) {
    const stateSelect = document.getElementById(stateSelectId);
    const districtSelect = document.getElementById(districtSelectId);
    const selectedState = stateSelect.value;

    districtSelect.innerHTML = '<option value="">Select District</option>';

    if (selectedState) {
        districts[selectedState].forEach(district => {
            const option = document.createElement("option");
            option.value = district;
            option.textContent = district;
            districtSelect.appendChild(option);
        });
    }
}
function getSelectedLanguages() {
    const select = document.getElementById("languagesSelect");
    const selectedValues = Array.from(select.selectedOptions).map(option => option.value);
    console.log("Selected Languages:", selectedValues);
}
const maxSizeInMB = 2;

  function validateFileInput(fileInput) {
    const errorMessage = fileInput.nextElementSibling;
    
    if (fileInput.files.length > 0) {
      const fileSizeInMB = fileInput.files[0].size / (1024 * 1024);
      
      if (fileSizeInMB > maxSizeInMB) {
        errorMessage.textContent = `File size exceeds ${maxSizeInMB}MB. Please choose a smaller file.`;
        errorMessage.style.display = 'block';
        fileInput.value = '';
      } else {
        errorMessage.style.display = 'none';
      }
    }
  }

  document.querySelectorAll('input[type="file"]').forEach(fileInput => {
    fileInput.addEventListener('change', function () {
      validateFileInput(fileInput);
    });
  });

  document.querySelector('form').addEventListener('submit', function (event) {
    let isFormValid = true;

    document.querySelectorAll('input[type="file"]').forEach(fileInput => {
      if (fileInput.files.length === 0) {
        isFormValid = false;
      }
    });

    if (!isFormValid) {
      event.preventDefault();
      alert('Please select all required files before submitting.');
    }
  });


    

  $(document).ready(function() {
    $('.selectpicker').selectpicker();
  });

  function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result; 
            imagePreview.style.display = 'block'; 
        };

        reader.readAsDataURL(file); 
    } else {
        imagePreview.src = './assets/avatar.jpg'; 
        imagePreview.style.display = 'none'; 
    }
}

function checkRequiredFieldsFilled(tabId) {
  const requiredFields = document.querySelectorAll(`#${tabId} input[required], #${tabId} select[required]`);
  let allFilled = true;

  requiredFields.forEach(field => {
      if (field.tagName.toLowerCase() === 'select') {
          if (field.value === '') {
              allFilled = false;
          }
      } else {
          if (field.value.trim() === '') {
              allFilled = false;
          }
      }
  });

  const tabButton = document.getElementById(`${tabId}-tab`);
  if (allFilled) {
      tabButton.style.backgroundColor = '#0C5A02';
      tabButton.style.color = '#fff';
  } else {
      tabButton.style.backgroundColor = '';
      tabButton.style.color = '#d7660a';
  }
}

const tabIds = ['tab1', 'tab2', 'tab3', 'tab4', 'tab5'];

tabIds.forEach(tabId => {
  document.querySelectorAll(`#${tabId} input[required], #${tabId} select[required]`).forEach(field => {
      field.addEventListener('input', () => checkRequiredFieldsFilled(tabId));
      field.addEventListener('change', () => checkRequiredFieldsFilled(tabId));
  });
});
function validatePhoneNumber(input) {
  const phoneNumber = input.value.trim();
  const messageElement = createErrorMessageElement(input, true);

  messageElement.textContent = ""; 

  if (input.id === 'WhatsappNumber' || input.id === 'familyNumber' || input.id === 'aadharMobile' || input.id === 'referNo') {
      if (phoneNumber.length < 10) {
          messageElement.textContent = 'Please enter a valid 10-digit number.';
          input.classList.add("is-invalid");
      } else {
          input.classList.remove("is-invalid");
      }
  } else {
      if (!phoneNumber) {
          messageElement.textContent = 'This field is required.';
          input.classList.add("is-invalid");
      } else {
          input.classList.remove("is-invalid");
      }
  }
}

['WhatsappNumber', 'familyNumber', 'aadharMobile', 'referNo'].forEach(id => {
  document.getElementById(id).addEventListener('blur', function () {
      validatePhoneNumber(this);
  });
});

function validateOtherField(input) {
    const messageElement = createErrorMessageElement(input, false); 
  
    messageElement.textContent = ""; 
  
    if (input.required && !input.value.trim()) {
        messageElement.textContent = 'This field is required.';
        input.classList.add("is-invalid");
    } else {
        input.classList.remove("is-invalid");
    }
  }
  function validateAge() {
    const dobInput = document.getElementById('dob');
    const dobValue = new Date(dobInput.value);
    const currentDate = new Date();
    const age = currentDate.getFullYear() - dobValue.getFullYear();
    const monthDifference = currentDate.getMonth() - dobValue.getMonth();
    const dayDifference = currentDate.getDate() - dobValue.getDate();
    const adjustedAge = (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) ? age - 1 : age;

    if (adjustedAge < 18) {
        document.getElementById('dobError').style.display = 'block';
        dobInput.value = '';
    } else {
        document.getElementById('dobError').style.display = 'none';
    }
}


const allFields = Array.from(document.querySelectorAll('input, select'));
const excludedIDs = ['WhatsappNumber', 'familyNumber', 'aadharMobile', 'referNo'];

const otherFields = allFields.filter(field => !excludedIDs.includes(field.id));

otherFields.forEach(field => {
  field.addEventListener('blur', function () {
      validateOtherField(this);
  });
});



  
  window.onload = () => {
    const fields = document.querySelectorAll('.modalInput');

    fields.forEach(field => {
        const savedValue = sessionStorage.getItem(field.id);
        console.log(`Loaded ${field.id}: ${savedValue}`); 
        if (savedValue) {
            field.value = savedValue;
        }

        if (field.tagName === 'INPUT') {
            field.addEventListener('input', () => {
                console.log(`Saving ${field.id}: ${field.value}`);
                sessionStorage.setItem(field.id, field.value);
            });
        }

        if (field.tagName === 'SELECT') {
            field.addEventListener('change', () => {
                console.log(`Saving ${field.id}: ${field.value}`);
                sessionStorage.setItem(field.id, field.value);
            });
        }
    });
    
    document.querySelector('form').addEventListener('submit', () => {
        sessionStorage.clear(); 
    });
};

