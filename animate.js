const second_process = document.getElementById("second_process");
const check = document.getElementById("check");
const continue_button = document.getElementById("continue_button");
const continue_button2 = document.getElementById("continue_button2");
const cancel_button = document.getElementById("cancel_button");
const show_payment_modal = document.querySelectorAll("#show_payment_modal");
const price_summary = document.getElementById("price_summary");

function handlePersonalDetailAnimation() {
  //   pay_monthly.style.color = "#0074D9";
  //   pay_full.style.color = "black";
  gsap.to("#check", {
    display: "flex",
    y: 0,
    // x: -50,
    scale: 10,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
    ease: "bounce",
  });
  gsap.to("#second_process", {
    display: "flex",
    y: 0,
    // x: -300,
    scale: 0.1,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  gsap.to("#details_form", {
    display: "flex",
    // y: 1000,
    x: 1000,
    // scale: 0.1,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
    display: "none",
  });
  gsap.to("#details_form2", {
    marginTop: 0,
    // x: 1000,
    // scale: 0.1,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
    display: "flex",
  });
}

// Checking if the form is filled before animation
document.getElementById("form").addEventListener("submit", function (event) {
  // Get all form elements
  const formElements = document.getElementById("form").elements;
  let allFilled = true;

  // Loop through each form element
  for (let i = 0; i < formElements.length; i++) {
    const element = formElements[i];

    // Check if the element is not a button
    if (element.type !== "submit" && element.type !== "button") {
      // Check if the element's value is empty
      if (element.value.trim() === "") {
        allFilled = false;
        element.style.borderColor = "red"; // Optional: Highlight empty fields
      } else {
        element.style.borderColor = ""; // Reset border color for non-empty fields
      }
    }
  }
  if (!allFilled) {
    alert("Please fill in all fields.");
    event.preventDefault();
  } else {
    continue_button.addEventListener("click", handlePersonalDetailAnimation);
  }
});

function handleCheck2() {
  gsap.to("#check2", {
    display: "flex",
    y: 0,
    // x: -50,
    scale: 10,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
    ease: "bounce",
  });
  gsap.to("#third_process", {
    display: "flex",
    y: 0,
    // x: -300,
    scale: 0.1,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
}

// Flutterwave payment function
function generateRandomTxRef(length = 16) {
  const characters =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  let result = "";
  const charactersLength = characters.length;
  for (let i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}

// get Query parameters from url
function getQueryParams() {
  const params = {};
  const queryString = window.location.search.substring(1);
  const queries = queryString.split("&");

  queries.forEach((query) => {
    const [key, value] = query.split("=");
    params[decodeURIComponent(key)] = decodeURIComponent(value);
  });

  return params;
}

// Retrieve the parameters
const queryParams = getQueryParams();
console.log("Query Parameters:", queryParams);

function handlePersonalDetailAnimation2() {
  //   pay_monthly.style.color = "#0074D9";
  //   pay_full.style.color = "black";
  gsap.to("#check", {
    display: "flex",
    y: 0,
    // x: -50,
    scale: 0.1,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
    ease: "bounce",
  });
  gsap.to("#second_process", {
    display: "flex",
    y: 0,
    // x: -300,
    scale: 1,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  gsap.to("#details_form", {
    display: "flex",
    // y: 1000,
    x: 0,
    // scale: 0.1,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
    display: "flex",
    flexDirection: "column",
  });
  setTimeout(() => {
    window.location.href = `http://localhost/Dex/Personal_details.php?selectedCar=${queryParams.selectedCar}&userId=${queryParams.userId}&fullPrice=${queryParams.fullPrice}&duration=${queryParams.duration}&startDate=${queryParams.startDate}&endDate=${queryParams.endDate}&downPayment=${queryParams.downPayment}&amountPerMonth=${queryParams.amountPerMonth}&remainingMonth=${queryParams.remainingMonth}&userid=${queryParams.userid}&form=submitted&paid=paid`;
  });
}

continue_button2.addEventListener("click", handlePersonalDetailAnimation2);

function makePayment() {
  FlutterwaveCheckout({
    public_key: "FLWPUBK_TEST-02b9b5fc6406bd4a41c3ff141cc45e93-X",
    tx_ref: generateRandomTxRef(),
    amount: 5000,
    currency: "NGN",
    payment_options: "card, banktransfer, ussd",
    redirect_url: `http://172.20.10.11/Dex/Personal_details.php?selectedCar=${queryParams.selectedCar}&userId=${queryParams.userId}&duration=${queryParams.duration}&startDate=${queryParams.startDate}&endDate=${queryParams.endDate}&downPayment=3800000&amountPerMonth=${queryParams.amountPerMonth}&remainingMonth=${queryParams.remainingMonth}&userid=${queryParams.userid}&form=submitted&paid=paid`,
    meta: {
      source: "docs-inline-test",
      consumer_mac: "92a3-912ba-1192a",
    },
    customer: {
      email: "test@mailinator.com",
      phone_number: queryParams.mobile_number,
      name: `${queryParams.firstname} ${queryParams.lastname}`,
    },
    customizations: {
      title: "Dex",
      description: `${queryParams.car_name}`,
      logo: "https://checkout.flutterwave.com/assets/img/rave-logo.png",
    },
    callback: function (data) {
      console.log("payment callback:", data);
    },
    onclose: function () {
      console.log("Payment cancelled!");
      handlePersonalDetailAnimation2();
    },
  });
}

if (queryParams.form == "submitted") {
  handlePersonalDetailAnimation();
}
if (queryParams.form == "submitted" && queryParams.paid == "paid") {
  handleCheck2();
  console.log("done");
  setTimeout(() => {
    window.location.href = "dashboard.php";
  }, 1000);
}

if (queryParams.paid == "notPaid") {
  // setTimeout(() => {
  //   makePayment();
  // }, 1000);
}
