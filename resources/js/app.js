import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import.meta.glob(['../images/**',]);

import './dates.js';


document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.tabs-nav-item').forEach(function(item, index){
        item.addEventListener('click', function(e){
            this.closest('.tabs').querySelectorAll('.active').forEach(function (activeItem){
                activeItem.classList.remove('active');
                activeItem.classList.add('inactive');
            });
           let contentItem = this.closest('.tabs').querySelector('div.tabs-content-item:nth-of-type('+(index+1)+')')
            if(contentItem) {
                contentItem.classList.remove('inactive');
                contentItem.classList.add('active');
                item.classList.remove('inactive');
                item.classList.add('active');
            }
        })
    })

    document.querySelectorAll('button[data-dropdown-toggle]').forEach(function(item, index) {
        item.addEventListener('click', function(e){
            e.preventDefault();
            let value = this.dataset.dropdownToggle;
            let target = document.getElementById(value);
            if(target) {
                target.classList.toggle('hidden');
            }
        })
    })

})
