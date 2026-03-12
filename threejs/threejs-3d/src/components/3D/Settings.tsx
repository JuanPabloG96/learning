import { OrbitControls } from '@react-three/drei'
export function Settings() {
  return (
    <>
      <OrbitControls />
      <gridHelper args={[50, 50, 'gray', 'gray']} />
      <ambientLight intensity={0.5} />
      <directionalLight position={[10, 10, 10]} intensity={2} />
      <directionalLight position={[-15, 5, 12]} intensity={2} />
    </>
  );
}
