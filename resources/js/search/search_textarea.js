const btnSearch = document.querySelector('#search');

btnSearch.addEventListener('click', () => {
  const className = 'is-hidden';
  const els = document.getElementsByClassName(className);
  while (els.length > 0) els[0].classList.remove(className);

  const nav = document.querySelector('#navigation');
  nav.classList.add(className);
});
