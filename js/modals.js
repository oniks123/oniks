const body = document.querySelector("body")
const editBTN = document.querySelectorAll(".edit_account")
const banBTN = document.querySelector(".ban_account")
const editMODAL = document.querySelector(".modal_edit_account")
const cancel = document.querySelectorAll("#cancel")

editBTN.forEach(element => {
    element.addEventListener("click", () => {
        window.scrollTo(pageYOffset, 0);
        body.classList.add ("body_block")
        editMODAL.classList.remove ("hide")
    })
});

cancel.forEach(element => {
    element.addEventListener("click", () => {
        body.classList.remove ("body_block")
        editMODAL.classList.add ("hide")
    })
});

