import React, { useEffect, useState } from 'react';
import { LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend } from 'recharts';
import moment from 'moment';

interface DataItem {
  mensagem: number;
  topico: string;
  qos: string;
  horario: string;
}

const LineChartComponent: React.FC = () => {
  const [data, setData] = useState<DataItem[]>([]);

  useEffect(() => {
    const fetchData = async () => {
      const response = await fetch('/microondas.json');
      const json = await response.json();
      setData(json.slice(-10));
    };
    fetchData();
  }, []);

  useEffect(() => {
    const interval = setInterval(() => {
      const fetchData = async () => {
        const response = await fetch('/microondas.json');
        const json = await response.json();
        setData((prevData) => [...prevData.slice(0, -1), json.slice(-1)[0]]);
      };
      fetchData();
    });
    return () => clearInterval(interval);
    
  }, [setData]);

  return (
    <LineChart width={500} height={300} data={data}>
      <CartesianGrid strokeDasharray="3 3" />
      <XAxis dataKey="horario" tickFormatter={(value) => moment(value).format('HH:mm:ss')} />
      <YAxis />
      <Tooltip labelFormatter={(value) => moment(value).format('HH:mm:ss')} />
      <Legend />
      <Line type="monotone" dataKey="mensagem" stroke="#8884d8" activeDot={{ r: 8 }} />
    </LineChart>
  );
};

export default LineChartComponent;
