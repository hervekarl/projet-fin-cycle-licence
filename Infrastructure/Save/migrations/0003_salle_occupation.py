# Generated by Django 3.2.5 on 2024-07-07 22:47

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('Save', '0002_auto_20240707_2124'),
    ]

    operations = [
        migrations.AddField(
            model_name='salle',
            name='occupation',
            field=models.IntegerField(null=True),
        ),
    ]
