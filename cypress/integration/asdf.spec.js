it('displays two todo items by default', () => {
  cy.intercept('http://matsu.test/api/asdf', {
    statusCode: 200,
  })

  cy.visit('/')

  cy.get('button[type="submit"]').click()
})
