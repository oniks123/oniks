const body = document.querySelector("body")
const cancel = document.querySelectorAll("#cancel")

const unbanBTN = document.querySelectorAll(".unban_account")
const unbanMODAL = document.querySelector(".modal_unban_account")

const dellBTN = document.querySelectorAll(".dell_account")
const dellMODAL = document.querySelector(".modal_dell_account")

unbanBTN.forEach(element => {
    element.addEventListener("click", () => {
        window.scrollTo(pageYOffset, 0);
        body.classList.add ("body_block")
        unbanMODAL.classList.remove ("hide")
    })
});

dellBTN.forEach(element => {
    element.addEventListener("click", () => {
        window.scrollTo(pageYOffset, 0);
        body.classList.add ("body_block")
        dellMODAL.classList.remove ("hide")
    })
});

cancel.forEach(element => {
    element.addEventListener("click", () => {
        body.classList.remove ("body_block")
        unbanMODAL.classList.add ("hide")
        dellMODAL.classList.add ("hide")
    })
});