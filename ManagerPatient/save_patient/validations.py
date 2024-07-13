from .models import *
from rest_framework import serializers
from rest_framework.validators import *

valide=UniqueValidator(queryset=Patient.objects.all())

def validate_photo(value):
    qs=Patient.objects.using('patient').filter(photo_patient__iexact=value)
    if qs.exists():
        raise serializers.ValidationError(f"La photo {value} existe déjà")
    return value


def validate_tel(value):
    qs=Patient.objects.using('patient').filter(tel_patient__iexact=value)
    if qs.exists():
        raise serializers.ValidationError(f"Le numero {value} existe déjà")
    return value