<?php

namespace Zorac\PhpStanPhpDI;

use DI\Attribute\Inject;
use PHPStan\Reflection\PropertyReflection;
use PHPStan\Rules\Properties\ReadWritePropertiesExtension;

/**
 * PHPStan extension to mark properties which are `#[Inject]`ed by PHP-DI as
 * always written.
 */
class InjectedPropertiesExtension implements ReadWritePropertiesExtension
{
    /**
     * Check if this property is always read.
     *
     * @param PropertyReflection $property A PHPStan reflection property.
     * @param string $propertyName The property name
     * @return false
     */
    public function isAlwaysRead(
        PropertyReflection $property,
        string $propertyName
    ): bool {
        return false;
    }

    /**
     * Check if this property is always written.
     *
     * @param PropertyReflection $property A PHPStan reflection property.
     * @param string $propertyName The property name
     * @return bool True if the property has an `#[Inject]` attribute, false
     *      otherwise.
     */
    public function isAlwaysWritten(
        PropertyReflection $property,
        string $propertyName
    ): bool {
        return $this->isInjected($property, $propertyName);
    }

    /**
     * Check if this property is initialized.
     *
     * @param PropertyReflection $property A PHPStan reflection property.
     * @param string $propertyName The property name
     * @return bool True if the property has an `#[Inject]` attribute, false
     *      otherwise.
     */
    public function isInitialized(
        PropertyReflection $property,
        string $propertyName
    ): bool {
        return $this->isInjected($property, $propertyName);
    }

    /**
     * Check if this property is injected by PHP-DI.
     *
     * @param PropertyReflection $property A PHPStan reflection property.
     * @param string $propertyName The property name
     * @return bool True if the property has an `#[Inject]` attribute, false
     *      otherwise.
     */
    private function isInjected(
        PropertyReflection $property,
        string $propertyName
    ): bool {
        $class = $property->getDeclaringClass();
        $native_class = $class->getNativeReflection();
        $native_property = $native_class->getProperty($propertyName);
        $attributes = $native_property->getAttributes(Inject::class);

        return !empty($attributes);
    }
}
