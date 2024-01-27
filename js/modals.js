const body = document.querySelector("body")
const cancel = document.querySelectorAll("#cancel")

const editBTN = document.querySelectorAll(".edit_account")
const editMODAL = document.querySelector(".modal_edit_account")

const banBTN = document.querySelectorAll(".ban_account")
const banMODAL = document.querySelector(".modal_ban_account")

const unbanBTN = document.querySelectorAll(".unban_account")
const unbanMODAL = document.querySelector(".modal_unban_account")


editBTN.forEach(element => {
    element.addEventListener("click", () => {
        window.scrollTo(pageYOffset, 0);
        body.classList.add ("body_block")
        editMODAL.classList.remove ("hide")
    })
});

banBTN.forEach(element => {
    element.addEventListener("click", () => {
        window.scrollTo(pageYOffset, 0);
        body.classList.add ("body_block")
        banMODAL.classList.remove ("hide")
    })
});

unbanBTN.forEach(element => {
    element.addEventListener("click", () => {
        window.scrollTo(pageYOffset, 0);
        body.classList.add ("body_block")
        unbanMODAL.classList.remove ("hide")
    })
});

cancel.forEach(element => {
    element.addEventListener("click", () => {
        body.classList.remove ("body_block")
        editMODAL.classList.add ("hide")
        banMODAL.classList.add ("hide")
        unbanMODAL.classList.add ("hide")
    })
});