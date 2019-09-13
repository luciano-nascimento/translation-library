<?php

include_once 'Translator.php';

Translator::setLanguage('pt');
echo "Translation: " . Translator::translate('bicycle');