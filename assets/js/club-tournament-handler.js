// collect toggles of unplayed games
const activeFormToggles = document.querySelectorAll('.result-pending .result-form-toggle')

// check if touched to prevent double firing
let touched = false

// node list to array
const formToggles = [...activeFormToggles]

for (const toggle of formToggles) { // schneller als click auf smartphones
  toggle.addEventListener('touchstart', e => {
    touched = true
    handleClick(e)
  })
  toggle.addEventListener('click', e => {
    if (touched) { // click verzögert, touch schon passiert
      return
    } else {
      handleClick(e)
    }
  })
}

function handleClick(e) {
  let toggle = e.target // button
  let parent = toggle.parentElement // td
  const form = parent.querySelector('form')
  console.log(form)
  form.classList.remove('hidden')
  // prevent scrolling of background
  document.body.style.overflow = 'hidden'

  // handle click on cancel button
  let cancelButton = form.querySelector('.cancel-button')
  cancelButton.addEventListener('click', e => {
    form.classList.add('hidden')
    document.body.style.overflow = 'visible'
  })
}
