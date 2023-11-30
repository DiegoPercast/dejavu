let seats = document.querySelector(".all-seats")
for (let i=0;i<59;i++) {
  let randint = Math.floor(Math.random() * 2)
  let booked = randint === 1 ? 'booked' : ""
  let disabled = randint === 1 ? "disabled" : ""
  seats.insertAdjacentHTML("beforeend", `<div class="${booked}"><input type="checkbox" name="tickets" id="s${i+2}" ${disabled}/>
  <label for="s${i+2}" class="seat"></label></div>`)
} 



