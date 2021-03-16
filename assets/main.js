import './scripts/publicPath'
import 'console-polyfill'
import 'normalize.css/normalize.css'
import './main.scss'
import $ from 'jquery'
import feather from 'feather-icons'

import installCE from 'document-register-element/pony'

window.jQuery = $

window.lazySizesConfig = window.lazySizesConfig || {}
window.lazySizesConfig.preloadAfterLoad = true
require('lazysizes')

$(window).scroll(function () {
  var scroll = $(window).scrollTop()
  if (scroll > 100) {
    // $('header').addClass('mainHeaderFixed')
    $('#menuWrapper').addClass('containerScrolled')
    $('.logo-container').addClass('logoScrolled')
    $('.menu-link').addClass('menu-link-scrolled')
  } else {
    // $('header').removeClass('mainHeaderFixed')
    $('#menuWrapper').removeClass('containerScrolled')
    $('.logo-container').removeClass('logoScrolled')
    $('.menu-link').removeClass('menu-link-scrolled')
  }
})

$(document).ready(function () {
  feather.replace({
    'stroke-width': 1
  })

  $('.modal-trigger').on('click', function (e) {
    e.preventDefault()
    var md = $(this).data('modal')
    var mc = '#modal-' + md
    var m = $(mc)
    m.fadeIn()
    return false
  })

  $('.close').on('click', function (e) {
    e.preventDefault()
    var m = $(this).parents('.modal')
    m.fadeOut()
    return false
  })
})

// $(document).ready(function () {
// var cf7submit = document.querySelector('div.w-button-submit')
// cf7submit.insertAdjacentHTML('afterbegin', '<button type="submit" value="Submit" class="wpcf7-form-control button wpcf7-submit"><span class="skew-text">Submit</span></button>')
// })

installCE(window, {
  type: 'force',
  noBuiltIn: true
})

function importAll (r) {
  r.keys().forEach(r)
}

importAll(require.context('../Components/', true, /\/script\.js$/))
