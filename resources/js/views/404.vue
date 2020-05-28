<template>
  <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center text-center error-page">
          <div class="row flex-grow">
              <div class="col-lg-7 mx-auto">
                  <div class="row align-items-center d-flex flex-row">
                      <div class="col-lg-6 text-lg-right pr-lg-4">
                          <h1 class="display-1 mb-0">404</h1>
                      </div>
                      <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                          <h2>DESCULPE!</h2>
                          <h3 class="font-weight-light">A página que procura não foi encontrada.</h3>
                          <h4 class="font-weight-light"><a @click="$router.go(-1)" href="#">Voltar para a página anterior.</a></h4>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>
