const pay_monthly = document.getElementById("pay_monthly");
const pay_full = document.getElementById("pay_full");
const cancel_button = document.getElementById("cancel_button");
const show_payment_modal = document.querySelectorAll("#show_payment_modal");
const price_summary = document.getElementById("price_summary");

function handleClick() {
  pay_monthly.style.color = "#0074D9";
  pay_full.style.color = "black";
  gsap.to("#Modal", {
    // y: 0,
    // x: -300,
    height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  gsap.to("#price_summary", {
    // y: 0,
    x: 500,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  gsap.to("#payment_plan", {
    // y: 0,
    x: -500,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  //   Monthly payment
  gsap.to("#price_summary2", {
    // y: 0,
    // x: 500,
    marginTop: "-220px",
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  gsap.to("#payment_plan2", {
    // y: 0,
    // x: 500,
    marginTop: "-200px",
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
}

pay_monthly.addEventListener("click", handleClick);

function handleClick2() {
  pay_monthly.style.color = "black";
  pay_full.style.color = "#0074D9";
  gsap.to("#Modal", {
    // y: 0,
    // x: -300,
    height: 400,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  gsap.to("#price_summary", {
    // y: 0,
    x: 0,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  gsap.to("#payment_plan", {
    // y: 0,
    x: 0,
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  gsap.to("#price_summary2", {
    // y: 0,
    // x: 500,
    marginTop: "500px",
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
  gsap.to("#payment_plan2", {
    // y: 0,
    // x: 500,
    marginTop: "500px",
    // height: 550,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
}

pay_full.addEventListener("click", handleClick2);

function handleOpen() {
  console.log("clicked");
  gsap.to("#Modal", {
    // y: 50,
    //x: -300,
    //   height: 550,
    // opacity: 0,
    top: "50%",
    duration: "0.9",
    delay: "0.1",
  });
}
show_payment_modal.forEach((item) =>
  item.addEventListener("click", handleOpen)
);

function handleClose() {
  gsap.to("#Modal", {
    top: "-50%",
    //x: -300,
    // height: 500,
    // opacity: 0,
    duration: "0.9",
    delay: "0.1",
  });
}

cancel_button.addEventListener("click", handleClose);

const calculated_price = document.getElementById("calculated_price");
const month_term = document.getElementById("month_term");
const monthly_payment = document.getElementById("monthly_payment");

const full_Price = 26410000;

// Month Box Function

const Months = [36, 48, 60, 72, 84];
const month_list = document.getElementById("month_list");

function populateList() {
  Months.forEach((value) => {
    // Create a new list item
    const listItem = document.createElement("li");

    // Set the text content of the list item to the integer value
    listItem.textContent = value;
    listItem.style.listStyle = "none";
    listItem.className = "month_box";

    // the default term in month is 36 so setting the li with the value of 36 to be selected
    if (value == 36) {
      listItem.style.backgroundColor = "#0074D9";
      listItem.style.color = "white";
    }
    // Add a click event listener to log the clicked value
    listItem.addEventListener("click", () => {
      console.log(`Clicked value: ${typeof value}`);
      if (value === value) {
        // Calculating the price per month
        const newprice = Math.floor(full_Price / value);
        const formatted_newprice = newprice.toLocaleString();
        // changing the price in the ui
        calculated_price.innerHTML = `₦${formatted_newprice}<span>/mo</span>`;
        month_term.innerHTML = `${value} month term and 11.4% APR`;
        monthly_payment.innerHTML = `₦${formatted_newprice}`;
      }
      //   Changing the colors of the unselected li
      const listItems = month_list.querySelectorAll("li");
      listItems.forEach(
        (item) => (
          (item.style.color = "black"),
          (item.style.backgroundColor = "transparent")
        )
      );

      // Set the clicked item to green
      listItem.style.backgroundColor = "#0074D9";
      listItem.style.color = "white";
    });
    // listItem.style.backgroundColor = "transparent";

    // Append the list item to the unordered list
    month_list.appendChild(listItem);
  });
}

populateList();
