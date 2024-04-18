@extends('layouts.guest')
@section( 'title', "Login Register" )
@section( 'description', 'In order to register for a conference/event at Daystar Conferences, you have to create an account and login for you to procceed the conference registration')
@section( 'image', "https://www.daystar.ac.ke/images/home/home-apply.jpg" )
{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    :root {
    --blue: #5e72e4;
    --indigo: #5603ad;
    --purple: #8965e0;
    --pink: #f3a4b5;
    --red: #f5365c;
    --orange: #fb6340;
    --yellow: #ffd600;
    --green: #2dce89;
    --teal: #11cdef;
    --cyan: #2bffc6;
    --white: #fff;
    --gray: #8898aa;
    --gray-dark: #32325d;
    --light: #ced4da;
    --lighter: #e9ecef;
    --primary: #5e72e4;
    --secondary: #f7fafc;
    --success: #2dce89;
    --info: #11cdef;
    --warning: #fb6340;
    --danger: #f5365c;
    --light: #adb5bd;
    --dark: #212529;
    --default: #172b4d;
    --white: #fff;
    --neutral: #fff;
    --darker: black;
    --breakpoint-xs: 0;
    --breakpoint-sm: 576px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 992px;
    --breakpoint-xl: 1200px;
    --font-family-sans-serif: Open Sans, sans-serif;
    --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}
@-ms-viewport {
    width: device-width;
}

figcaption,
footer,
header,
main,
nav,
section {
    display: block;
}

body {
    font-family: Open Sans, sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    margin: 0;
    text-align: left;
    color: #525f7f;
    background-color: #f8f9fe;
}

[tabindex='-1']:focus {
    outline: 0 !important;
}

h1 {
    margin-top: 0;
    margin-bottom: .5rem;
}

p {
    margin-top: 0;
    margin-bottom: 1rem;
}

ul {
    margin-top: 0;
    margin-bottom: 1rem;
}

ul ul {
    margin-bottom: 0;
}

dfn {
    font-style: italic;
}

strong {
    font-weight: bolder;
}

small {
    font-size: 80%;
}

a {
    text-decoration: none;
    color: #5e72e4;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}

a:hover {
    text-decoration: none;
    color: #233dd2;
}

a:not([href]):not([tabindex]) {
    text-decoration: none;
    color: inherit;
}

a:not([href]):not([tabindex]):hover,
a:not([href]):not([tabindex]):focus {
    text-decoration: none;
    color: inherit;
}

a:not([href]):not([tabindex]):focus {
    outline: 0;
}

img {
    vertical-align: middle;
    border-style: none;
}

svg {
    overflow: hidden;
    vertical-align: middle;
}

caption {
    padding-top: 1rem;
    padding-bottom: 1rem;
    caption-side: bottom;
    text-align: left;
    color: #8898aa;
}

label {
    display: inline-block;
    margin-bottom: .5rem;
}

button {
    border-radius: 0;
}

button:focus {
    outline: 1px dotted;
    outline: 5px auto -webkit-focus-ring-color;
}

input,
button {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    margin: 0;
}

button,
input {
    overflow: visible;
}

button {
    text-transform: none;
}

button,
html [type='button'],
[type='reset'],
[type='submit'] {
    -webkit-appearance: button;
}

button::-moz-focus-inner,
[type='button']::-moz-focus-inner,
[type='reset']::-moz-focus-inner,
[type='submit']::-moz-focus-inner {
    padding: 0;
    border-style: none;
}

input[type='radio'],
input[type='checkbox'] {
    box-sizing: border-box;
    padding: 0;
}

input[type='date'],
input[type='time'],
input[type='datetime-local'],
input[type='month'] {
    -webkit-appearance: listbox;
}

legend {
    font-size: 1.5rem;
    line-height: inherit;
    display: block;
    width: 100%;
    max-width: 100%;
    margin-bottom: .5rem;
    padding: 0;
    white-space: normal;
    color: inherit;
}

[type='number']::-webkit-inner-spin-button,
[type='number']::-webkit-outer-spin-button {
    height: auto;
}

[type='search'] {
    outline-offset: -2px;
    -webkit-appearance: none;
}

[type='search']::-webkit-search-cancel-button,
[type='search']::-webkit-search-decoration {
    -webkit-appearance: none;
}

::-webkit-file-upload-button {
    font: inherit;
    -webkit-appearance: button;
}

[hidden] {
    display: none !important;
}

h1,
.h1 {
    font-family: inherit;
    font-weight: 600;
    line-height: 1.5;
    margin-bottom: .5rem;
    color: #32325d;
}

h1,
.h1 {
    font-size: 1.625rem;
}

small,
.small {
    font-size: 80%;
    font-weight: 400;
}

.form-control {
    font-size: 1rem;
    line-height: 1.5;
    display: block;
    width: 100%;
    height: calc(2.75rem + 2px);
    padding: .625rem .75rem;
    transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
    color: #8898aa;
    border: 1px solid #cad1d7;
    border-radius: .375rem;
    background-color: #fff;
    background-clip: padding-box;
    box-shadow: none;
}

@media screen and (prefers-reduced-motion: reduce) {
    .form-control {
        transition: none;
    }
}

.form-control::-ms-expand {
    border: 0;
    background-color: transparent;
}

.form-control:focus {
    color: #8898aa;
    border-color: rgba(50, 151, 211, .25);
    outline: 0;
    background-color: #fff;
    box-shadow: none, none;
}

.form-control:-ms-input-placeholder {
    opacity: 1;
    color: #adb5bd;
}

.form-control::-ms-input-placeholder {
    opacity: 1;
    color: #adb5bd;
}

.form-control::placeholder {
    opacity: 1;
    color: #adb5bd;
}

.form-control:disabled,
.form-control[readonly] {
    opacity: 1;
    background-color: #e9ecef;
}

.form-group {
    margin-bottom: 1.5rem;
}

.btn {
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.5;
    display: inline-block;
    padding: .625rem 1.25rem;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    border: 1px solid transparent;
    border-radius: .375rem;
}

@media screen and (prefers-reduced-motion: reduce) {
    .btn {
        transition: none;
    }
}

.btn:hover,
.btn:focus {
    text-decoration: none;
}

.btn:focus {
    outline: 0;
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.btn:disabled {
    opacity: .65;
    box-shadow: none;
}

.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}

.btn:not(:disabled):not(.disabled):active {
    box-shadow: none;
}

.btn:not(:disabled):not(.disabled):active:focus {
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08), none;
}

.btn-primary {
    color: #fff;
    border-color: #5e72e4;
    background-color: #5e72e4;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}

.btn-primary:hover {
    color: #fff;
    border-color: #5e72e4;
    background-color: #5e72e4;
}

.btn-primary:focus {
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(94, 114, 228, .5);
}

.btn-primary:disabled {
    color: #fff;
    border-color: #5e72e4;
    background-color: #5e72e4;
}

.btn-primary:not(:disabled):not(.disabled):active {
    color: #fff;
    border-color: #5e72e4;
    background-color: #324cdd;
}

.btn-primary:not(:disabled):not(.disabled):active:focus {
    box-shadow: none, 0 0 0 0 rgba(94, 114, 228, .5);
}

.btn-neutral {
    color: #212529;
    border-color: #fff;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}

.btn-neutral:hover {
    color: #212529;
    border-color: white;
    background-color: white;
}

.btn-neutral:focus {
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(255, 255, 255, .5);
}

.btn-neutral:disabled {
    color: #212529;
    border-color: #fff;
    background-color: #fff;
}

.btn-neutral:not(:disabled):not(.disabled):active {
    color: #212529;
    border-color: white;
    background-color: #e6e6e6;
}

.btn-neutral:not(:disabled):not(.disabled):active:focus {
    box-shadow: none, 0 0 0 0 rgba(255, 255, 255, .5);
}

.collapse:not(.show) {
    display: none;
}

.input-group {
    position: relative;
    display: flex;
    width: 100%;
    flex-wrap: wrap;
    align-items: stretch;
}

.input-group > .form-control {
    position: relative;
    width: 1%;
    margin-bottom: 0;
    flex: 1 1 auto;
}

.input-group > .form-control + .form-control {
    margin-left: -1px;
}

.input-group > .form-control:focus {
    z-index: 3;
}

.input-group > .form-control:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.input-group > .form-control:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

.input-group-prepend {
    display: flex;
}

.input-group-prepend .btn {
    position: relative;
    z-index: 2;
}

.input-group-prepend .btn + .btn,
.input-group-prepend .btn + .input-group-text,
.input-group-prepend .input-group-text + .input-group-text,
.input-group-prepend .input-group-text + .btn {
    margin-left: -1px;
}

.input-group-prepend {
    margin-right: -1px;
}

.input-group-text {
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    display: flex;
    margin-bottom: 0;
    padding: .625rem .75rem;
    text-align: center;
    white-space: nowrap;
    color: #adb5bd;
    border: 1px solid #cad1d7;
    border-radius: .375rem;
    background-color: #fff;
    align-items: center;
}

.input-group-text input[type='radio'],
.input-group-text input[type='checkbox'] {
    margin-top: 0;
}

.input-group > .input-group-prepend > .btn,
.input-group > .input-group-prepend > .input-group-text {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.input-group > .input-group-prepend:not(:first-child) > .btn,
.input-group > .input-group-prepend:not(:first-child) > .input-group-text,
.input-group > .input-group-prepend:first-child > .btn:not(:first-child),
.input-group > .input-group-prepend:first-child > .input-group-text:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

.custom-control {
    position: relative;
    display: block;
    min-height: 1.5rem;
    padding-left: 1.75rem;
}

.custom-control-input {
    position: absolute;
    z-index: -1;
    opacity: 0;
}

.custom-control-input:checked ~ .custom-control-label::before {
    color: #fff;
    background-color: #5e72e4;
    box-shadow: none;
}

.custom-control-input:focus ~ .custom-control-label::before {
    box-shadow: none;
}

.custom-control-input:active ~ .custom-control-label::before {
    color: #fff;
    background-color: #5e72e4;
    box-shadow: none;
}

.custom-control-input:disabled ~ .custom-control-label {
    color: #8898aa;
}

.custom-control-input:disabled ~ .custom-control-label::before {
    background-color: #e9ecef;
}

.custom-control-label {
    position: relative;
    margin-bottom: 0;
}

.custom-control-label::before {
    position: absolute;
    top: .125rem;
    left: -1.75rem;
    display: block;
    width: 1.25rem;
    height: 1.25rem;
    content: '';
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    pointer-events: none;
    background-color: #fff;
    box-shadow: none;
}

.custom-control-label::after {
    position: absolute;
    top: .125rem;
    left: -1.75rem;
    display: block;
    width: 1.25rem;
    height: 1.25rem;
    content: '';
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 50% 50%;
}

.custom-checkbox .custom-control-label::before {
    border-radius: .25rem;
}

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
    background-color: #5e72e4;
}

.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before {
    background-color: #5e72e4;
    box-shadow: none;
}

.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::after {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns=\http://www.w3.org/2000/svg\ viewBox=\0 0 4 4\%3E%3Cpath stroke=\%23fff\ d=\M0 2h4\/%3E%3C/svg%3E");
}

.custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
    background-color: rgba(94, 114, 228, .5);
}

.custom-checkbox .custom-control-input:disabled:indeterminate ~ .custom-control-label::before {
    background-color: rgba(94, 114, 228, .5);
}

.custom-control-label::before {
    transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

@media screen and (prefers-reduced-motion: reduce) {
    .custom-control-label::before {
        transition: none;
    }
}

.nav {
    display: flex;
    margin-bottom: 0;
    padding-left: 0;
    list-style: none;
    flex-wrap: wrap;
}

.nav-link {
    display: block;
    padding: .25rem .75rem;
}

.nav-link:hover,
.nav-link:focus {
    text-decoration: none;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    border: 1px solid rgba(0, 0, 0, .05);
    border-radius: .375rem;
    background-color: #fff;
    background-clip: border-box;
}

.card-body {
    padding: 1.5rem;
    flex: 1 1 auto;
}

.card-header {
    margin-bottom: 0;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid rgba(0, 0, 0, .05);
    background-color: #fff;
}

.card-header:first-child {
    border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
}

@keyframes progress-bar-stripes {
    from {
        background-position: 1rem 0;
    }

    to {
        background-position: 0 0;
    }
}

.bg-secondary {
    background-color: #f7fafc !important;
}

a.bg-secondary:hover,
a.bg-secondary:focus,
button.bg-secondary:hover,
button.bg-secondary:focus {
    background-color: #d2e3ee !important;
}

.bg-default {
    background-color: #172b4d !important;
}

a.bg-default:hover,
a.bg-default:focus,
button.bg-default:hover,
button.bg-default:focus {
    background-color: #0b1526 !important;
}

.bg-transparent {
    background-color: transparent !important;
}

.border-0 {
    border: 0 !important;
}

@media (min-width: 768px) {
    .d-md-none {
        display: none !important;
    }
}

.justify-content-center {
    justify-content: center !important;
}

.align-items-center {
    align-items: center !important;
}

@media (min-width: 1200px) {

    .justify-content-xl-end {
        justify-content: flex-end !important;
    }

    .justify-content-xl-between {
        justify-content: space-between !important;
    }
}

.shadow {
    box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
}

.ml-1 {
    margin-left: .25rem !important;
}

.mt-2 {
    margin-top: .5rem !important;
}

.mt-3 {
    margin-top: 1rem !important;
}

.mb-3 {
    margin-bottom: 1rem !important;
}

.my-4 {
    margin-top: 1.5rem !important;
}

.mb-4,
.my-4 {
    margin-bottom: 1.5rem !important;
}

.mt--8 {
    margin-top: -8rem !important;
}

.mb-7 {
    margin-bottom: 6rem !important;
}

.px-4 {
    padding-right: 1.5rem !important;
}

.px-4 {
    padding-left: 1.5rem !important;
}

.py-5 {
    padding-top: 3rem !important;
}

.pb-5,
.py-5 {
    padding-bottom: 3rem !important;
}

.py-7 {
    padding-top: 6rem !important;
}

.py-7 {
    padding-bottom: 6rem !important;
}

.ml-auto {
    margin-left: auto !important;
}

@media (min-width: 992px) {


    .py-lg-5 {
        padding-top: 3rem !important;
    }

    .px-lg-5 {
        padding-right: 3rem !important;
    }

    .py-lg-5 {
        padding-bottom: 3rem !important;
    }

    .px-lg-5 {
        padding-left: 3rem !important;
    }

    .py-lg-8 {
        padding-top: 8rem !important;
    }

    .py-lg-8 {
        padding-bottom: 8rem !important;
    }
}

.text-right {
    text-align: right !important;
}

.text-center {
    text-align: center !important;
}

@media (min-width: 1200px) {
    .text-xl-left {
        text-align: left !important;
    }
}

.font-weight-bold {
    font-weight: 600 !important;
}

.text-white {
    color: #fff !important;
}

.text-light {
    color: #adb5bd !important;
}

a.text-light:hover,
a.text-light:focus {
    color: #919ca6 !important;
}

.text-white {
    color: #fff !important;
}

a.text-white:hover,
a.text-white:focus {
    color: #e6e6e6 !important;
}

.text-muted {
    color: #8898aa !important;
}

@media print {
    *,
  *::before,
  *::after {
        box-shadow: none !important;
        text-shadow: none !important;
    }

    a:not(.btn) {
        text-decoration: underline;
    }

    img {
        page-break-inside: avoid;
    }

    p {
        orphans: 3;
        widows: 3;
    }

@    page {
        size: a3;
    }

    body {
        min-width: 992px !important;
    }

    .navbar {
        display: none;
    }
}

figcaption,
main {
    display: block;
}

main {
    overflow: hidden;
}

.bg-gradient-primary {
    background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
}

.bg-gradient-primary {
    background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
}

.fill-default {
    fill: #172b4d;
}

@keyframes floating-lg {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(15px);
    }

    100% {
        transform: translateY(0px);
    }
}

@keyframes floating {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(10px);
    }

    100% {
        transform: translateY(0px);
    }
}

@keyframes floating-sm {
    0% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(5px);
    }

    100% {
        transform: translateY(0px);
    }
}

[class*='shadow'] {
    transition: all .15s ease;
}

.text-white {
    color: #fff !important;
}

a.text-white:hover,
a.text-white:focus {
    color: #e6e6e6 !important;
}

.text-light {
    color: #ced4da !important;
}

a.text-light:hover,
a.text-light:focus {
    color: #b1bbc4 !important;
}

.btn {
    font-size: .875rem;
    position: relative;
    transition: all .15s ease;
    letter-spacing: .025em;
    text-transform: none;
    will-change: transform;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.btn:not(:last-child) {
    margin-right: .5rem;
}

.btn i:not(:first-child),
.btn svg:not(:first-child) {
    margin-left: .5rem;
}

.btn i:not(:last-child),
.btn svg:not(:last-child) {
    margin-right: .5rem;
}

.input-group .btn {
    margin-right: 0;
    transform: translateY(0);
}

[class*='btn-outline-'] {
    border-width: 1px;
}

.btn-inner--icon i:not(.fa) {
    position: relative;
    top: 2px;
}

.btn-neutral {
    color: #5e72e4;
}

.btn-icon .btn-inner--icon img {
    width: 20px;
}

.btn-icon .btn-inner--text:not(:first-child) {
    margin-left: .75em;
}

.btn-icon .btn-inner--text:not(:last-child) {
    margin-right: .75em;
}

.main-content {
    position: relative;
}

.main-content .navbar-top {
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    width: 100%;
    padding-right: 0 !important;
    padding-left: 0 !important;
    background-color: transparent;
}

.custom-checkbox .custom-control-input ~ .custom-control-label {
    font-size: .875rem;
    cursor: pointer;
}

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
    border-color: #5e72e4;
}

.custom-checkbox .custom-control-input:disabled ~ .custom-control-label::before {
    border-color: #e9ecef;
}

.custom-checkbox .custom-control-input:disabled:checked::before {
    border-color: rgba(94, 114, 228, .5);
}

.custom-control-label::before {
    transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
    border: 1px solid #cad1d7;
}

.custom-control-label span {
    position: relative;
    top: 2px;
}

.custom-control-label {
    margin-bottom: 0;
}

.custom-control-alternative .custom-control-label::before {
    border: 0;
    box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
}

.custom-control-alternative .custom-control-input:checked ~ .custom-control-label::before {
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}

.custom-control-alternative .custom-control-input:active ~ .custom-control-label::before,
.custom-control-alternative .custom-control-input:focus ~ .custom-control-label::before {
    box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
}

.custom-checkbox .custom-control-input ~ .custom-control-label {
    font-size: .875rem;
    cursor: pointer;
}

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
    border-color: #5e72e4;
}

.custom-checkbox .custom-control-input:disabled ~ .custom-control-label::before {
    border-color: #e9ecef;
}

.custom-checkbox .custom-control-input:disabled:checked::before {
    border-color: rgba(94, 114, 228, .5);
}

.footer {
    padding: 2.5rem 0;
    background: #f7fafc;
}

.footer .nav .nav-item .nav-link {
    color: #8898aa !important;
}

.footer .nav .nav-item .nav-link:hover {
    color: #525f7f !important;
}

.footer .copyright {
    font-size: .875rem;
}

.nav-footer .nav-link {
    font-size: .875rem;
}

.nav-footer .nav-item:last-child .nav-link {
    padding-right: 0;
}

.form-control {
    font-size: .875rem;
}

.form-control:focus:-ms-input-placeholder {
    color: #adb5bd;
}

.form-control:focus::-ms-input-placeholder {
    color: #adb5bd;
}

.form-control:focus::placeholder {
    color: #adb5bd;
}

.input-group {
    transition: all .15s ease;
    border-radius: .375rem;
    box-shadow: none;
}

.input-group .form-control {
    box-shadow: none;
}

.input-group .form-control:not(:first-child) {
    padding-left: 0;
    border-left: 0;
}

.input-group .form-control:not(:last-child) {
    padding-right: 0;
    border-right: 0;
}

.input-group .form-control:focus {
    box-shadow: none;
}

.input-group-text {
    transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
}

.input-group-alternative {
    transition: box-shadow .15s ease;
    border: 0;
    box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
}

.input-group-alternative .form-control,
.input-group-alternative .input-group-text {
    border: 0;
    box-shadow: none;
}

.header {
    position: relative;
}

.input-group {
    transition: all .15s ease;
    border-radius: .375rem;
    box-shadow: none;
}

.input-group .form-control {
    box-shadow: none;
}

.input-group .form-control:not(:first-child) {
    padding-left: 0;
    border-left: 0;
}

.input-group .form-control:not(:last-child) {
    padding-right: 0;
    border-right: 0;
}

.input-group .form-control:focus {
    box-shadow: none;
}

.input-group-text {
    transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
}

.input-group-alternative {
    transition: box-shadow .15s ease;
    border: 0;
    box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
}

.input-group-alternative .form-control,
.input-group-alternative .input-group-text {
    border: 0;
    box-shadow: none;
}

.nav-link {
    color: #525f7f;
}

.nav-link:hover {
    color: #5e72e4;
}

.nav-link i.ni {
    position: relative;
    top: 2px;
}

.navbar-horizontal .navbar-nav .nav-link {
    font-size: .9rem;
    font-weight: 400;
    transition: all .15s linear;
    letter-spacing: 0;
    text-transform: normal;
}

@media screen and (prefers-reduced-motion: reduce) {
    .navbar-horizontal .navbar-nav .nav-link {
        transition: none;
    }
}

.navbar-horizontal .navbar-nav .nav-link .nav-link-inner--text {
    margin-left: .25rem;
}

.navbar-horizontal .navbar-brand {
    font-size: .875rem;
    font-size: .875rem;
    font-weight: 600;
    letter-spacing: .05px;
    text-transform: uppercase;
}

.navbar-horizontal .navbar-brand img {
    height: 30px;
}

.navbar-horizontal .navbar-dark .navbar-brand {
    color: #fff;
}

@media (min-width: 992px) {
    .navbar-horizontal .navbar-nav .nav-item {
        margin-right: .5rem;
    }

    .navbar-horizontal .navbar-nav .nav-item [data-toggle='dropdown']::after {
        transition: all .15s ease;
    }

    .navbar-horizontal .navbar-nav .nav-link {
        padding-top: 1rem;
        padding-bottom: 1rem;
        border-radius: .375rem;
    }

    .navbar-horizontal .navbar-nav .nav-link i {
        margin-right: .625rem;
    }

    .navbar-horizontal .navbar-nav .nav-link-icon {
        font-size: 1rem;
        padding-right: .5rem !important;
        padding-left: .5rem !important;
        border-radius: .375rem;
    }

    .navbar-horizontal .navbar-nav .nav-link-icon i {
        margin-right: 0;
    }
}

@media (min-width: 768px) {

@    keyframes show-navbar-dropdown {
        0% {
      transition: visibility .25s, opacity .25s, transform .25s;
        transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
        opacity: 0;
    }

    100% {
        transform: translate(0, 0);
        opacity: 1;
    }
}

@keyframes hide-navbar-dropdown {
    from {
        opacity: 1;
    }

    to {
        transform: translate(0, 10px);
        opacity: 0;
    }
}
}

.navbar-collapse-header {
    display: none;
}

@media (max-width: 767.98px) {
    .navbar-nav .nav-link {
        padding: .625rem 0;
        color: #172b4d !important;
    }

    .navbar-collapse {
        position: absolute;
        z-index: 1050;
        top: 0;
        right: 0;
        left: 0;
        overflow-y: auto;
        width: calc(100% - 1.4rem);
        height: auto !important;
        margin: .7rem;
        opacity: 0;
    }

    .navbar-collapse .navbar-toggler {
        position: relative;
        display: inline-block;
        width: 20px;
        height: 20px;
        padding: 0;
        cursor: pointer;
    }

    .navbar-collapse .navbar-toggler span {
        position: absolute;
        display: block;
        width: 100%;
        height: 2px;
        opacity: 1;
        border-radius: 2px;
        background: #283448;
    }

    .navbar-collapse .navbar-toggler :nth-child(1) {
        transform: rotate(135deg);
    }

    .navbar-collapse .navbar-toggler :nth-child(2) {
        transform: rotate(-135deg);
    }

    .navbar-collapse .navbar-collapse-header {
        display: block;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, .1);
    }

    .navbar-collapse .collapse-brand img {
        height: 36px;
    }

    .navbar-collapse .collapse-close {
        text-align: right;
    }
}

@keyframes show-navbar-collapse {
    0% {
        transform: scale(.95);
        transform-origin: 100% 0;
        opacity: 0;
    }

    100% {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes hide-navbar-collapse {
    from {
        transform: scale(1);
        transform-origin: 100% 0;
        opacity: 1;
    }

    to {
        transform: scale(.95);
        opacity: 0;
    }
}

.separator {
    position: absolute;
    top: auto;
    right: 0;
    left: 0;
    overflow: hidden;
    width: 100%;
    height: 150px;
    transform: translateZ(0);
    pointer-events: none;
}

.separator svg {
    position: absolute;
    pointer-events: none;
}

.separator-bottom {
    top: auto;
    bottom: 0;
}

.separator-bottom svg {
    bottom: 0;
}

.separator-skew {
    height: 60px;
}

@media (min-width: 1200px) {
    .separator-skew {
        height: 70px;
    }
}

p {
    font-size: 1rem;
    font-weight: 300;
    line-height: 1.7;
}

@media (max-width: 768px) {
    .btn {
        margin-bottom: 10px;
    }
}

#navbar .navbar {
    margin-bottom: 20px;
}

#navbar .navbar-toggler {
    pointer-events: none;
}

/* icons */

@font-face {
font-family: 'NucleoIcons';
src: url("https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/fonts/nucleo/nucleo-icons.eot");
src: url("https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/fonts/nucleo/nucleo-icons.eot") format('embedded-opentype'), url("https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/fonts/nucleo/nucleo-icons.woff2") format('woff2'), url("https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/fonts/nucleo/nucleo-icons.woff") format('woff'), url("https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/fonts/nucleo/nucleo-icons.ttf") format('truetype'), url("https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/fonts/nucleo/nucleo-icons.svg") format('svg');
font-weight: normal;
font-style: normal;
}

.ni {
    display: inline-block;
    font: normal normal normal 14px/1 NucleoIcons;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

@-webkit-keyframes nc-spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    }
}

@-moz-keyframes nc-spin {
    0% {
        -moz-transform: rotate(0deg);
    }

    100% {
        -moz-transform: rotate(360deg);
    }
}

@keyframes nc-spin {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}

.ni-circle-08::before {
    content: "\ea27";
}

.ni-email-83::before {
    content: "\ea30";
}

.ni-key-25::before {
    content: "\ea3b";
}

.ni-lock-circle-open::before {
    content: "\ea3e";
}

.ni-planet::before {
    content: "\ea47";
}

.ni-single-02::before {
    content: "\ea4e";
}

.ni-hat-3::before {
    content: "\ea37";
}


@media (max-width: 768px) {
    .btn {
        margin-bottom: 10px;
    }
}

#navbar .navbar {
    margin-bottom: 20px;
}

#navbar .navbar-toggler {
    pointer-events: none;
}

</style>

@section('content')
    @include('partials.guest.header')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    <!-- Header -->
    <div class="header bg-primary py-7 py-lg-8">
        <div class="container">
          <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-6">
                <h1 class="text-white">Welcome!</h1>
                <p class="text-lead text-light">Use these awesome forms to login or create new account in your project for free.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
      <!-- Page content -->
      <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
          <div class="col-md-8 col-md-offset-2">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>Or sign up with credentials</small>
                </div>
                <form role="form">
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                      </div>
                      <input class="form-control" placeholder="Name" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" type="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" type="password">
                    </div>
                  </div>
                  <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div>
                  <div class="row my-4">
                    <div class="col-12">
                      <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                        <label class="custom-control-label" for="customCheckRegister">
                          <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary mt-4">Create account</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <script>
        $(function() {
           $("form[name='login']").validate({
             rules: {
               
               email: {
                 required: true,
                 email: true
               },
               password: {
                 required: true,
                 
               }
             },
              messages: {
               email: "Please enter a valid email address",
              
               password: {
                 required: "Please enter password",
                
               }
               
             },
             submitHandler: function(form) {
               form.submit();
             }
           });
         });
         


        $(function() {
          
          $("form[name='registration']").validate({
            rules: {
              title: "required",
              first_name: "required",
              last_name: "required",
              email: {
                required: true,
                email: true
              },
              password: {
                required: true,
                minlength: 6
              }
            },
            
            messages: {
              title: "Please enter your firstname",
              first_name: "Please enter your firstname",
              last_name: "Please enter your lastname",
              password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
              },
              email: "Please enter a valid email address"
            },
          
            submitHandler: function(form) {
              form.submit();
            }
          });
        });
    </script>
@endsection
