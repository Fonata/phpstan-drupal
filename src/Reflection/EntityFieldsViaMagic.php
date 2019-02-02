<?php

namespace PHPStan\Reflection;

use Drupal\Core\Entity\ContentEntityBase;
use PHPStan\Type\MixedType;

class EntityFieldsViaMagic implements PropertiesClassReflectionExtension {

  public function hasProperty(ClassReflection $classReflection, string $propertyName): bool {
    return $classReflection->isSubclassOf(ContentEntityBase::class);
  }

  public function getProperty(ClassReflection $classReflection, string $propertyName): PropertyReflection {
    return new class implements PropertyReflection {

      public function getType(): \PHPStan\Type\Type {
        return new MixedType();
      }

      public function getDeclaringClass():ClassReflection {
        return $classReflection;
      }

      public function isStatic():bool {
        return FALSE;
      }

      public function isPrivate() :bool{
        return FALSE;
      }

      public function isPublic() :bool{
        return TRUE;
      }
      public function isReadable() :bool{
        return TRUE;
      }
      public function isWritable() :bool{
        return TRUE;
      }

    };
  }
}
