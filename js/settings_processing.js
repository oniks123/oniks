$(document).ready(function () {
    const forms = document.querySelectorAll("form")
    const msg = document.querySelector(".msg")

    forms.forEach(element => {
        element.addEventListener("submit", function(event)  {
            event.preventDefault();
            $.post("../core/settings_update.php",$(this).serialize());
            msg.classList.remove("hide")
            var counter = 5;
            var interval = setInterval(function() {
              counter--;              
              if (counter === 0) {
                clearInterval(interval);
                msg.classList.add("hide")
              }
            }, 1000);
        })
    });          
});
