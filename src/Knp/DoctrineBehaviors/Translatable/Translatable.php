<?php

/*
 * This file is part of the KnpDoctrineBehaviors package.
 *
 * (c) KnpLabs <http://knplabs.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Knp\DoctrineBehaviors\Translatable;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Translatable trait.
 *
 * Should be used inside entity, that needs to be translated.
 */
trait Translatable
{
    /**
     * Will be mapped to translatable entity
     * by TranslatableListener
     */
    private $translations;

    /**
     * Returns collection of translations.
     *
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations = $this->translations ?: new ArrayCollection();
    }

    /**
     * Adds new translation.
     *
     * @param Translation $translation The translation
     */
    public function addTranslation($translation)
    {
        $this->getTranslations()->add($translation);
        $translation->setTranslatable($this);
    }

    /**
     * Removes specific translation.
     *
     * @param Translation $translation The translation
     */
    public function removeTranslation($translation)
    {
        $this->getTranslations()->removeElement($translation);
    }

    /**
     * Returns translation for specific locale (creates new one if doesn't exists).
     *
     * @param string $locale The locale (en, ru, fr)
     *
     * @return Translation
     */
    public function translate($locale)
    {
        if ($translation = $this->findTranslationByLocale($locale)) {
            return $translation;
        }

        $class       = self::getTranslationEntityClass();
        $translation = new $class();
        $translation->setLocale($locale);

        $this->addTranslation($translation);

        return $translation;
    }

    /**
     * Returns translation entity class name.
     *
     * @return string
     */
    static public function getTranslationEntityClass()
    {
        return __CLASS__.'Translation';
    }

    /**
     * Finds specific translation in collection by its locale.
     *
     * @param string $locale The locale (en, ru, fr)
     *
     * @return Translation|null
     */
    protected function findTranslationByLocale($locale)
    {
        $translations = $this->getTranslations()->filter(function($translation) use ($locale) {
            return $locale === $translation->getLocale();
        });

        return $translations->first();
    }
}
