import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import.meta.glob(['../images/**',]);

import './dates.js';

import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.tabs-nav-item').forEach(function (item, index) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            this.closest('.tabs').querySelectorAll('.active').forEach(function (activeItem) {
                activeItem.classList.remove('active');
                activeItem.classList.add('inactive');
            });
            let contentItem = this.closest('.tabs').querySelector('div.tabs-content-item:nth-of-type(' + (index + 1) + ')')
            if (contentItem) {
                contentItem.classList.remove('inactive');
                contentItem.classList.add('active');
                item.classList.remove('inactive');
                item.classList.add('active');
            }
        })
    })

    document.querySelectorAll('button[data-dropdown-toggle]').forEach(function (item, index) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            let value = this.dataset.dropdownToggle;
            let target = document.getElementById(value);
            if (target) {
                target.classList.toggle('hidden');
            }
        })
    })


    setTimeout(async function () {
        let canvas = document.getElementById('sleepChart');
        if(!canvas) {
            return;
        }
        let context = canvas.getContext('2d');
        let url = '/charts/sleep';
        if(canvas.dataset?.periodStart && canvas.dataset?.periodEnd) {
            url+= '?filterFrom='+canvas.dataset.periodStart+'&filterTo='+canvas.dataset.periodEnd;
        }
        try {
            const response = await axios.get(url);
            console.log(response);
            new Chart(context, {
                type: 'bar',
                data: {
                    labels: response.data.labels,
                    datasets: response.data.datasets
                },
                options: {
                    animation: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        } catch (e) {
            canvas.closest('div').innerHTML = '<p>Не се пронајдени податоци</p>'
        }

    }, 100);

})
