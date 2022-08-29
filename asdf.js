document.querySelectorAll('.is-selectable')[3].click();

setTimeout(() => {
  // open dropdown
  document
    .querySelector('[tableid=clear-estate-manage-table] p')
    .parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.children[6].querySelectorAll('button')[1]
    .click();

  setTimeout(() => {
    // click 'Reset demo data'
    document
      .querySelector('[tableid=clear-estate-manage-table] p')
      .parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.children[6].querySelectorAll('a')[1]
      .click();

    setTimeout(() => {
      // click 'Notify creditors and government agencies'
      [...document.querySelectorAll('p')].filter(element => element.innerText.includes('Notify creditors'))[0].click();

      setTimeout(() => {
        // click 'go'
        [...document.querySelectorAll('button')].filter(element => element.innerText.includes('Reset'))[0].click();
      }, 500);
    }, 1000);
  }, 500);
}, 1000);
