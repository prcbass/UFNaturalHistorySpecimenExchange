#!/bin/bash
COUNTER=0
for file in $(ls splitdir/); do
      if (( $COUNTER % 356 == 0)); then
              cat splitdir/$file >> importFile.csv
      fi
      let COUNTER=COUNTER+1
done