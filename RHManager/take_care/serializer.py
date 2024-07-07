from rest_framework import serializers

from .models import Soin

class SoinSerialiser(serializers.ModelSerializer):
    class Meta:
        model=Soin
        fields="__all__"