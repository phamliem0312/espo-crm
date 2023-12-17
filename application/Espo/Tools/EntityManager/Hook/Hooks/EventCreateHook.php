<?php
/************************************************************************
 * This file is part of EspoCRM.
 *
 * EspoCRM - Open Source CRM application.
 * Copyright (C) 2014-2023 Yurii Kuznietsov, Taras Machyshyn, Oleksii Avramenko
 * Website: https://www.espocrm.com
 *
 * EspoCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * EspoCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with EspoCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "EspoCRM" word.
 ************************************************************************/

namespace Espo\Tools\EntityManager\Hook\Hooks;

use Espo\Core\Templates\Entities\Event;
use Espo\Core\Utils\Language;
use Espo\Tools\EntityManager\Hook\CreateHook;
use Espo\Tools\EntityManager\Params;

class EventCreateHook implements CreateHook
{
    public function __construct(
        private Language $baseLanguage,
        private Language $language
    ) {}

    public function process(Params $params): void
    {
        if ($params->getType() !== Event::TEMPLATE_TYPE) {
            return;
        }

        $this->translate($this->baseLanguage, $params);

        if ($this->baseLanguage->getLanguage() === $this->language->getLanguage()) {
            return;
        }

        $this->translate($this->language, $params);
    }

    private function translate(Language $language, Params $params): void
    {
        $name = $params->getName();

        $label1 = 'Schedule ' . $name;
        $label2 = 'Log ' . $name;

        $translatedName = $params->get('labelSingular') ?? $name;

        $translation1 = $language->translateLabel('Schedule') . ' ' . $translatedName;
        $translation2 = $language->translateLabel('Log') . ' ' .  $translatedName;

        $language->set('Global', 'labels', $label1, $translation1);
        $language->set('Global', 'labels', $label2, $translation2);

        $language->save();
    }
}
