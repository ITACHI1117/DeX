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

function makePayment() {
  FlutterwaveCheckout({
    public_key: "FLWPUBK_TEST-02b9b5fc6406bd4a41c3ff141cc45e93-X",
    tx_ref: generateRandomTxRef(),
    amount: 83925000,
    currency: "NGN",
    payment_options: "card, banktransfer, ussd",
    redirect_url: "http://172.20.10.11/Dex/Personal_details.html",
    meta: {
      source: "docs-inline-test",
      consumer_mac: "92a3-912ba-1192a",
    },
    customer: {
      email: "test@mailinator.com",
      phone_number: "08100000000",
      name: "Ayomide Jimi-Oni",
    },
    customizations: {
      title: "Flutterwave Developers",
      description: "Test Payment",
      logo: "https://checkout.flutterwave.com/assets/img/rave-logo.png",
    },
    callback: function (data) {
      console.log("payment callback:", data);
    },
    onclose: function () {
      console.log("Payment cancelled!");
    },
  });
}
