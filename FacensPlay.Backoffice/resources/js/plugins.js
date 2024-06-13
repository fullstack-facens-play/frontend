//require('./../../public/vendor/jquery/jquery');
require('select2');
require('./../../public/vendor/daterangepicker/daterangepicker');
require('./plugins/bs-custom-file-input/index');
require('datatables');
require('./plugins/resumablejs1.1.0/resumable.min');
require('./../../public/vendor/summernote/summernote-bs4.min');
require('./../../public/vendor/summernote/lang/summernote-pt-BR');

import dataTablesptBR from './../../public/vendor/datatables/i18n/pt-BR.json';

$('select').select2({
    placeholder: 'Nenhum',
    width: '100%',
    allowClear: true
});

$(function () {
    $('.datetimepicker-input').daterangepicker({
      drops: 'up',
      autoApply: false,
      autoUpdateInput: false,
      timePicker: true,
      timePicker24Hour: true,
      singleDatePicker: true,
      showDropdowns: true,
      minYear: parseInt(moment().format('YYYY'), 10),
      maxYear: parseInt(moment().format('YYYY'), 10) + 10,
      locale: {
        applyLabel: 'Aplicar',
        cancelLabel: 'Limpar',
        format: 'DD/MM/YYYY HH:mm'
      }
    });

    $('.datepicker-input').daterangepicker({
      drops: 'up',
      autoApply: false,
      autoUpdateInput: false,
      timePicker: false,
      timePicker24Hour: true,
      singleDatePicker: true,
      showDropdowns: true,
      minYear: parseInt(moment().format('YYYY'), 10) - 100,
      maxYear: parseInt(moment().format('YYYY'), 10) + 10,
      locale: {
        applyLabel: 'Aplicar',
        cancelLabel: 'Limpar',
        format: 'DD/MM/YYYY'
      }
    });
  
    $('.datepicker-input').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY'));
    });
  
    $('.datepicker-input').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val("");
    });

    $('.datetimepicker-input').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format("DD/MM/YYYY HH:mm"));
    });
  
    $('.datetimepicker-input').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val("");
    });

    bsCustomFileInput.init();

    $('table').dataTable({
      language: dataTablesptBR
    });
  });
