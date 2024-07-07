from audioop import reverse
from django.db import models

from save_employer.models import Employer

# Create your models here.

class Soin(models.Model):
    employer_id=models.ForeignKey(Employer, on_delete=models.CASCADE)
    patient_id=models.IntegerField()
    jour_arrive=models.DateTimeField()
    jour_sorti=models.DateTimeField()

    class Meta:
        db_table='Soin'
        app_label="take_care"
        verbose_name = "Soin"
        verbose_name_plural = "Soins"

    def __str__(self):
        return self.patient_id

    def get_absolute_url(self):
        return reverse("Soin_detail", kwargs={"pk": self.pk})
