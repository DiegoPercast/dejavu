let seats = document.querySelector(".all-seats");
for (let i = 0; i < 66; i++) {
  let rows = ["A", "B", "C", "D", "E", "F", "G"];
  if (i != 0 && i % 11 !== 0) {
    seats.insertAdjacentHTML(
      "beforeend",
      `<div><input type="checkbox" name="asiento[]" id="s${
        i + 2
      }" value="s${i+2}"/>
    <label for="s${i+2}" class="seat"></label></div>`
    );
  } else {
    let index = (i - 1) % 10;
    let row = i === 0 ? rows[0] : rows[index + 1];
    console.log(row, i, index);
    seats.insertAdjacentHTML("beforeend", `<div>${row}</div>`);
  }
}

let tickets = seats.querySelectorAll("input");
tickets.forEach((ticket) => {
  ticket.addEventListener("change", () => {
    let amount = Number(document.querySelector(".amount").innerHTML);
    let count = Number(document.querySelector(".count").innerHTML);

    if (ticket.checked) {
      count += 1;
      amount += 200;
    } else if (amount > 0){
      count -= 1;
      amount -= 200;
    }

    document.querySelector(".amount").innerHTML = `${amount}`;
    document.querySelector(".count").innerHTML = `${count}`;
  });
});
