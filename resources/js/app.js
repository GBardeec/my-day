import './bootstrap';

import * as bootstrap from 'bootstrap';

import './modals.js';

// import '../css/bootstrap.scss'
// import '../css/app.scss'
//
// import {livewire_hot_reload} from 'virtual:livewire-hot-reload';
//
// livewire_hot_reload();

//Включаем Bootstrap Tooltips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
